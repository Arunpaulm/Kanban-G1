<div>
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects Detail</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                    <a href="{{ route('project.board', $project->slug) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-info mr-1"></i> View Boards
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Start Date</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ \Carbon\Carbon::parse($project->start_date)->format('d-M-Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Estimated End Date</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ \Carbon\Carbon::parse($project->end_date)->format('d-M-Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Total Task</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $totalTasks }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if(count($activities))
                                    <h4>Recent Activity</h4>
                                    @foreach($activities as $activity)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ getImage($activity->logUser->profile_photo) }}" alt="user image">
                                                <span class="username">
                                                    <a href="#">{{ $activity->logUser->name }}</a>
                                                </span>
                                                <span class="description">
                                                    <div class="badge badge-info">{{ $activity->logUser->roles[0]->name }}</div>
                                                    - {{ \Carbon\Carbon::parse($activity->created_at)->format('h:i A d-M-Y') }}
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
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $project->name }}</h3>
                        <p class="text-muted">{{ $project->description }}</p>
                        <br>
                        <div class="user-list clearfix">
                            <h4 class="text-primary">Contributors</h4>
                            @can('add-contributor')
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control form-control-sm @error('contributor_email') is-invalid @enderror"
                                           wire:model.defer="contributor_email"
                                           placeholder="Contributor Email" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span wire:click="addContributor()" class="btn btn-sm btn-outline-success" id="basic-addon2"><i class="fas fa-plus"></i></span>
                                    </div>
                                </div>
                            @endcan

                            @if(count($projectContributors))
                                @foreach($projectContributors as $user)
                                    <div class="user-block mb-2">
                                        <img class="img-circle img-bordered-sm" src="{{ getImage($user->contributor->profile_photo) }}" alt="user image">
                                        <span class="username">
                                            <a href="#">{{ $user->contributor->name }}</a>
                                        </span>
                                        <span class="description">
                                            <div class="badge badge-info mr-1">{{ $user->contributor->roles[0]->name }}</div>
                                            @can('remove-contributor')
                                                @if($project->user_id != $user->user_id)
                                                    - <a class="btn btn-xs" wire:click="$emit('removeContributor', {{ $user->contributor->id }})">Remove</a>
                                                @endif
                                            @endcan
                                        </span>
                                    </div>
                                @endforeach
                            @else
                                <p>No Contributor Added In this Project.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('livewire-scripts')
    <script>
        window.livewire.on('closeModal', (message) => {
            Notiflix.Notify.success(message);
        });

        window.livewire.on('failedMessage', (message) => {
            Notiflix.Notify.failure(message);
        });

        window.livewire.on('removeContributor', (user_id) => {
            Notiflix.Confirm.show(
                'Remove Contributor',
                'Are you sure you want to remove this contributor?',
                'Yes',
                'No',
                function () {
                    @this.removeContributor(user_id)
                    Notiflix.Notify.success('Contributor has been removed successfully.');
                }
            );
        });
    </script>
@endpush
