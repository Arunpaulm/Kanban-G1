<div wire:ignore.self class="modal fade" id="task-details-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateTask()">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Task Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('task.name') is-invalid @enderror" id="name"
                                       name="name" wire:model.defer="task.name" required placeholder="Enter Task Name">
                                @error('task.name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="assignee" class="col-form-label">Assignee <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('task.assignee') is-invalid @enderror" id="assignee"
                                        name="assignee" wire:model.defer="task.assignee" required>
                                    <option value="">Assign To</option>
                                    @foreach($contributors as $user)
                                        <option value="{{ $user->contributor->id }}">
                                            {{ $user->contributor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('task.assignee')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control form-control-sm @error('task.description') is-invalid @enderror" id="description"
                                          name="description" wire:model.defer="task.description" placeholder="Task Description" rows="2"></textarea>
                                @error('task.description')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="priority" class="col-form-label">Priority <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('task.priority') is-invalid @enderror" id="priority"
                                        name="priority" wire:model.defer="task.priority" required>
                                    <option value="">Priority</option>
                                    @foreach(config('setting.priority') as $key => $priority)
                                        <option value="{{ $priority }}">
                                            {{ ucfirst($key) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('task.priority')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('task.status') is-invalid @enderror" id="status"
                                        name="status" wire:model.defer="task.status" required>
                                    <option value="">Status</option>
                                    @foreach(config('setting.task_status') as $key => $status)
                                        <option value="{{ $status }}">
                                            {{ camelString($key) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('task.status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="estimated_hrs" class="col-form-label">Estimated Hours</label>
                                <input type="number" class="form-control form-control-sm @error('task.estimated_hrs') is-invalid @enderror" id="estimated_hrs"
                                       name="estimated_hrs" wire:model.defer="task.estimated_hrs" placeholder="Enter Estimated Hours">
                                @error('task.estimated_hrs')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="due_date" class="col-form-label">Estimated Date</label>
                                <input type="date" class="form-control form-control-sm @error('task.due_date') is-invalid @enderror" id="due_date"
                                       name="due_date" wire:model.defer="task.due_date">
                                @error('task.due_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @can('edit-task')
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Update</button>
                            </div>
                        @endcan
                    </div>
                </form>
                <br>
                <hr>

                @can('add-comment')
                    <form wire:submit.prevent="addComment()">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control form-control-sm @error('comment') is-invalid @enderror" id="comment"
                                              name="comment" wire:model.defer="comment" placeholder="Add Your Comment" rows="2"></textarea>
                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                @endcan
            </div>
            <div class="modal-footer justify-content-between">
                    <div class="row">
                        <div class="col-12">
                            @if(count($taskComments))
                                <h4>Recent Activity</h4>
                                @foreach($taskComments as $activity)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ getImage($activity->logUser->profile_photo) }}" alt="user image">
                                            <span class="username">
                                                    <a href="#">{{ $activity->logUser->name }}</a>
                                                </span>
                                            <span class="description">
                                                    <div class="badge badge-info">{{ $activity->logUser->roles[0]->name }}</div>
                                                    - {{ \Carbon\Carbon::parse($activity->created_at)->format('h:i A d-M-Y') }}
                                                    @can('delete-comment')
                                                        - <a wire:click="$emit('deleteComment', {{ $activity->id }})" style="cursor: pointer;" class="text-danger">Delete</a>
                                                    @endcan
                                                </span>
                                        </div>

                                        <p>{{ $activity->description }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-danger">No activity found.</p>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
