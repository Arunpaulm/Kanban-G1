<div class="content-wrapper kanban" style="min-height: 598px;">
    <section class="content pb-3">
        <div class="container-fluid h-100">
            @foreach(config('setting.task_status') as $key => $value)
                <div class="card card-row">
                    <div class="card-header" style='background: {{ config("setting.task_status_color.$key") }}; color: white';>
                        <h3 class="card-title">
                            {{ camelString($key) }}
                        </h3>
                    </div>
                    <div class="card-body">
                        @can('view-task')
                            @if(isset($tasks[$value]) && sizeof($tasks[$value]))
                                @foreach($tasks[$value] as $task)
                                    <div wire:click="taskDetails({{ $task->id }})" class="card" style="cursor: pointer;">
                                        <div class="card-header" style="color: white; background: {{ getTaskPriorityColor($task->priority) }}">
                                            <h5 class="card-title">{{ $task->name }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endcan

                        @can('add-task')
                            @if($value == config('setting.task_status.to_do'))
                                <button wire:click="createTask" class="btn btn-block btn-outline-default"><i class="fas fa-plus mr-2"></i>Add Task</button>
                            @endif
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('livewire.partials.task-details-modal')

    <div wire:ignore.self class="modal fade" id="task-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="storeTask()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Task Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm @error('data.name') is-invalid @enderror" id="name"
                                           name="name" wire:model.defer="data.name" required placeholder="Enter Task Name">
                                    @error('data.name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="assignee" class="col-form-label">Assignee <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-sm @error('data.assignee') is-invalid @enderror" id="assignee"
                                            name="assignee" wire:model.defer="data.assignee" required>
                                            <option value="">Assign To</option>
                                            @foreach($contributors as $user)
                                                <option value="{{ $user->contributor->id }}">{{ $user->contributor->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('data.assignee')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea class="form-control form-control-sm @error('data.description') is-invalid @enderror" id="description"
                                              name="description" wire:model.defer="data.description" placeholder="Task Description" rows="2"></textarea>
                                    @error('data.description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('livewire-scripts')
    <script>
        window.livewire.on('closeModal', (message) => {
            $('.modal').modal('hide');
            Notiflix.Notify.success(message);
        });

        window.livewire.on('successMessage', (message) => {
            Notiflix.Notify.success(message);
        });

        window.livewire.on('failedMessage', (message) => {
            Notiflix.Notify.failure(message);
        });

        window.livewire.on('createTaskModal', () => {
            $('#task-modal').modal('show');
        });

        window.livewire.on('taskDetailsModal', () => {
            $('#task-details-modal').modal('show');
        });

        window.livewire.on('deleteComment', (comment_id) => {
            Notiflix.Confirm.show(
                'Delete Comment',
                'Are you sure you want to delete this comment?',
                'Yes',
                'No',
                function () {
                    @this.deleteComment(comment_id)
                        Notiflix.Notify.success('Comment deleted successfully');
                }
            );
        });
    </script>
@endpush
