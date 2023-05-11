<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = DB::table('projects')->select('projects.*')
            ->join('project_contributors as contributors', 'contributors.project_id', '=', 'projects.id')
            ->where('contributors.user_id', Auth::id())
            ->where('projects.status', config('setting.status.active'))
            ->orderBy('projects.created_at', 'asc')
            ->get();

        $to_do = config('setting.task_status.to_do');
        $in_progress = config('setting.task_status.in_progress');
        $completed = config('setting.task_status.completed');
        $taskSummery = DB::table('tasks')
            ->where('user_id', Auth::id())
            ->selectRaw("COALESCE(count(id),0) as total_task")
            ->selectRaw("count((CASE WHEN status = $to_do  THEN id END)) as total_to_do_task")
            ->selectRaw("count((CASE WHEN status = $in_progress  THEN id END)) as total_in_progress_task")
            ->selectRaw("count((CASE WHEN status = $completed  THEN id END)) as total_completed_task")
            ->first();
        return view('home', compact(['taskSummery', 'projects']));
    }
}
