<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\ProjectActivity;
use App\Models\ProjectContributor;
use App\Models\Task;
use App\Models\TaskComment;
use App\Traits\PermissionValidateTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;

class Board extends Component
{
    use PermissionValidateTrait;
    public $data, $slug, $project, $contributors, $task, $taskComments = [], $comment;

    public function createTask()
    {
        $this->resetInputs();
        $this->emit('createTaskModal');
    }

    public function storeTask()
    {
        if(!$this->authorizePermission('add-task')) return;
        $this->data = Purify::clean($this->data);
        $this->validate([
            'data.name'		        => 'required|string|max:50',
            'data.assignee'		    => 'required|integer|exists:project_contributors,user_id',
            'data.description'		=> 'nullable|string'
        ], [], [
            'data.name'		        => 'name',
            'data.assignee'		    => 'assignee',
            'data.description'		=> 'description'
        ]);

        $task = new Task();
        $task->project_id = $this->project->id;
        $task->name = $this->data['name'];
        $task->user_id = $this->data['assignee'];
        $task->description = $this->data['description'] ?? '';
        $task->priority = config('setting.priority.low');
        $task->status = config('setting.task_status.to_do');
        $task->save();

        $comment = new TaskComment();
        $comment->task_id = $task->id;
        $comment->user_id = Auth::id();
        $comment->description = 'Task created.';
        $comment->save();

        $activity = new ProjectActivity();
        $activity->project_id = $this->project->id;
        $activity->user_id = Auth::id();
        $activity->description = $this->data['name'] . ' created as a new task.';
        $activity->save();

        $this->emit('closeModal', 'Task created successfully.');
    }

    public function taskDetails($id)
    {
        $this->task = Task::where('id', $id)->first()->toArray();
        $this->taskComments = TaskComment::with('logUser')->where('task_id', $id)->orderBy('created_at', 'desc')->get();
        $this->task['assignee'] = $this->task['user_id'];
        $this->emit('taskDetailsModal');
    }

    public function updateTask()
    {
        if(!$this->authorizePermission('edit-task')) return;
        $this->task = Purify::clean($this->task);
        $this->validate([
            'task.name'		        => 'required|string|max:50',
            'task.assignee'		    => 'required|integer|exists:project_contributors,user_id',
            'task.description'		=> 'nullable|string',
            'task.priority'         => 'required|between:0,2',
            'task.status'           => 'required|between:0,5',
            'task.estimated_hrs'    => 'nullable|integer',
            'task.due_date'         => 'nullable|date'
        ], [], [
            'task.name'		        => 'name',
            'task.assignee'		    => 'assignee',
            'task.description'		=> 'description',
            'task.priority'         => 'priority',
            'task.status'           => 'status',
            'task.estimated_hrs'    => 'estimated hours',
            'task.due_date'         => 'due date'
        ]);

        $updateTask = Task::where('id', $this->task['id'])->first();
        $updateTask->name = $this->task['name'];
        $updateTask->user_id = $this->task['assignee'];
        $updateTask->description = $this->task['description'] ?? '';
        $updateTask->priority = $this->task['priority'];
        $updateTask->status = $this->task['status'];
        $updateTask->estimated_hrs = $this->task['estimated_hrs'];
        $updateTask->due_date = $this->task['due_date'] ? $this->task['due_date'] : null;

        if($updateTask->isClean())
        {
            $this->emit('failedMessage', 'Nothing to change.');
            return;
        }
        $updateTask->save();

        $comment = new TaskComment();
        $comment->task_id = $this->task['id'];
        $comment->user_id = Auth::id();
        $comment->description = 'Task has been updated.';
        $comment->save();

        $activity = new ProjectActivity();
        $activity->project_id = $this->task['project_id'];
        $activity->user_id = Auth::id();
        $activity->description = "Task ". $this->task['name'] ." has been updated";
        $activity->save();

        $this->taskDetails($this->task['id']);
        $this->emit('successMessage', 'Task updated successfully.');
    }

    public function addComment()
    {
        if(!$this->authorizePermission('add-comment')) return;
        $this->comment = Purify::clean($this->comment);
        $this->validate([
            'comment'		        => 'required|string'
        ]);

        $comment = new TaskComment();
        $comment->task_id = $this->task['id'];
        $comment->user_id = Auth::id();
        $comment->description = $this->comment;
        $comment->save();

        $this->comment = '';
        $this->taskDetails($this->task['id']);

        $this->emit('successMessage', 'Comment added successfully.');
    }

    public function deleteComment($id)
    {
        if(!$this->authorizePermission('delete-comment')) return;
        TaskComment::destroy($id);
        $this->taskDetails($this->task['id']);
    }

    public function resetInputs()
    {
        $this->data = [];
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->project = Project::where('slug', $this->slug)->first();
        $this->contributors = ProjectContributor::with('contributor')->where('project_id', $this->project->id)->get();
    }

    public function render()
    {
        $tasks = Task::where('project_id', $this->project->id)->get()->groupBy('status');
        return view('livewire.board', ['tasks' => $tasks])->extends('layout.board-template');
    }
}
