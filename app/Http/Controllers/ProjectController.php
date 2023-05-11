<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectActivity;
use App\Models\ProjectContributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-list', ['only' => ['index']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        $projects = DB::table('projects')->select('projects.*')
            ->join('project_contributors as contributors', 'contributors.project_id', '=', 'projects.id')
            ->where('contributors.user_id', Auth::id())
            ->where('projects.status', config('setting.status.active'))
            ->orderBy('projects.created_at', 'asc')
            ->get();
        return view('projects.index', compact(['projects']));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'name'               => 'required|string|min:5|max:30',
           'slug'               => 'required|string|min:3|max:20|unique:projects',
           'description'        => 'required|string',
           'start_date'         => 'required|date|before:end_date',
           'end_date'           => 'required|date|after:start_date',
           'avatar_image'       => "required|mimes:jpg,png,jpeg|max:" . config('setting.avatar_image.size'),
           'bg_image'           => "required|mimes:jpg,png,jpeg|max:" . config('setting.bg_image.size'),
        ], [], [
            'name'               => 'Project Name',
            'slug'               => 'Slug Name',
            'description'        => 'Project Description',
            'start_date'         => 'Start Date',
            'end_date'           => 'End Date',
            'avatar_image'       => 'Avatar Image',
            'bg_image'           => 'Background Image',
        ]);

        if($request->hasFile('avatar_image'))
            $avatar_image = Storage::disk('public')->putFile('project/avatar_image', $data['avatar_image'], 'public');

        if($request->hasFile('bg_image'))
            $bg_image = Storage::disk('public')->putFile('project/bg_image', $data['bg_image'], 'public');

        $project = new Project();
        $project->name = $data['name'];
        $project->slug = str_replace(' ', '_', strtolower($data['slug']));
        $project->description = $data['description'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->avatar_image = $avatar_image;
        $project->bg_image = $bg_image;
        $project->status = config('setting.status.active');
        $project->user_id = Auth::id();
        $project->save();

        $contributor = new ProjectContributor();
        $contributor->project_id = $project->id;
        $contributor->user_id = Auth::id();
        $contributor->save();

        $activity = new ProjectActivity();
        $activity->project_id = $project->id;
        $activity->user_id = Auth::id();
        $activity->description = 'Project has been created.';
        $activity->save();

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }
}
