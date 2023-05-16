<?php

namespace App\Http\Livewire;

use App\Models\ProjectActivity;
use App\Models\ProjectContributor;
use App\Models\Task;
use App\Models\User;
use App\Traits\PermissionValidateTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;

class ProjectDetails extends Component
{
    use PermissionValidateTrait;
    public $projectContributors, $activities, $project_id, $slug, $contributor_email, $totalTasks = 0;
    protected $projectDetails;

    // Adding user as contributor to the project
    public function addContributor()
    {
        if(!$this->authorizePermission('add-contributor')) return;
        if($this->contributor_email == '')
        {
            $this->emit('failedMessage', 'Contributor email field is required.');
            return;
        }

        $email = Purify::clean($this->contributor_email);
        $user = User::where('email', $email)->where('is_active', config('setting.status.active'))->first();
        if(!$user)
        {
            $this->emit('failedMessage', 'User not found.');
            return;
        }

        $search = ProjectContributor::where('project_id', $this->project_id)->where('user_id', $user->id)->first();
        if($search)
        {
            $this->emit('failedMessage', 'User already added in this project.');
            return;
        }

        $contributor = new ProjectContributor();
        $contributor->project_id = $this->project_id;
        $contributor->user_id = $user->id;
        $contributor->save();

        $activity = new ProjectActivity();
        $activity->project_id = $this->project_id;
        $activity->user_id = Auth::id();
        $activity->description = $user->name . ' has been added in this project as contributor.';
        $activity->save();

        $this->contributor_email = '';
        $this->emit('closeModal', 'Contributor added successfully.');
    }

    // Deleting user as contributor to the project
    public function removeContributor($user_id)
    {
        if(!$this->authorizePermission('remove-contributor')) return;
        ProjectContributor::where('project_id', $this->project_id)->where('user_id', $user_id)->delete();

        $user = User::where('id', $user_id)->first();

        $activity = new ProjectActivity();
        $activity->project_id = $this->project_id;
        $activity->user_id = Auth::id();
        $activity->description = $user->name . ' has been remove from this project as contributor.';
        $activity->save();
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    // Fetching project details 
    public function render()
    {
        $this->projectDetails = DB::table('projects')->select('projects.*')
            ->leftJoin('project_contributors as contributors', 'contributors.project_id', '=', 'projects.id')
            ->where('projects.slug', $this->slug)
            ->where('contributors.user_id', Auth::id())
            ->where('projects.status', config('setting.status.active'))
            ->orderBy('projects.created_at', 'desc')
            ->first();

        abort_if(!$this->projectDetails, 404);
        $this->project_id = $this->projectDetails->id;
        $this->totalTasks = Task::where('project_id', $this->project_id)->count();
        $this->projectContributors = ProjectContributor::with('contributor')->where('project_id', $this->projectDetails->id)->get();
        $this->activities = ProjectActivity::with('logUser')
            ->where('project_id', $this->projectDetails->id)
            ->orderBy('created_at', 'desc')->get();
        return view('livewire.project-details')->with('project', $this->projectDetails)->extends('layout.admin');
    }
}
