<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>
                    @can('user-create')
                        <button type="button" class="btn btn-sm btn-primary float-right" wire:click="createUser()">
                            Add New User
                        </button>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:10px;">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                                <th>Active Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            @can('user-status-update')
                                                <input
                                                    type="checkbox" class="custom-control-input" onclick="return false" onkeydown="return false"
                                                    wire:click="$emit('changeStatus', {{$user->id}})" value="{{$user->id}}" id="customSwitch{{ $user->id }}"
                                                    @if($user->is_active) checked @endif>
                                                <label class="custom-control-label" for="customSwitch{{ $user->id }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</label>
                                            @else
                                                <label>{{ $user->is_active ? 'Active' : 'Inactive' }}</label>
                                            @endcan
                                        </div>
                                    </td>
                                    <td>{{ $user->roles[0]->name  ?? 'N/A' }}</td>
                                    <td>
                                        @can('user-edit')
                                            <a class="btn btn-outline-warning btn-sm" wire:click="editUser({{ $user->id }})"><i class="fas fa-pencil-alt fa-sm"></i></a>
                                        @endcan
                                        @can('users-password-reset')
                                            <a class="btn btn-outline-warning btn-sm" wire:click="changePassword({{ $user->id }})"><i class="fas fa-key fa-sm"></i></a>
                                        @endcan
{{--                                        @can('assign-user-permission')--}}
{{--                                            <a class="btn btn-outline-info btn-sm" target="_blank" href="{{ route('admin.user.permissions', $user->id) }}"><i class="fas fa-info fa-sm ml-1 mr-1"></i></a>--}}
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links(config('system.pagination-theme')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="user-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if(isset($data['id']))
                            Edit User Details
                        @else
                            Add New User
                        @endif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="@if(isset($data['id'])) updateUser @else storeUser @endif">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm @error('data.name') is-invalid @enderror" id="name"
                                           name="name" wire:model.defer="data.name" required placeholder="Enter Name">
                                    @error('data.name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm @error('data.email') is-invalid @enderror" id="email"
                                           name="email" wire:model.defer="data.email" required placeholder="Enter Email">
                                    @error('data.email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm @error('data.phone') is-invalid @enderror" id="phone"
                                           name="phone" wire:model.defer="data.phone" placeholder="Enter Phone No.">
                                    @error('data.phone')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="role" class="col-form-label">Role <span class="text-danger">*</span></label>
                                    <select id="role" class="form-control form-control-sm @error('data.role') is-invalid @enderror" style="" name="role"
                                            wire:model.defer="data.role" required>
                                        <option>Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('data.role')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if(!isset($data['id']))
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" wire:model.defer="data.password"
                                               class="form-control form-control-sm @error('data.password') is-invalid @enderror" id="password"
                                               name="password" placeholder="Enter Password" autocomplete="new-password">
                                        @error('data.password')
                                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-sm @error('data.password_confirmation') is-invalid @enderror" wire:model.defer="data.password_confirmation"
                                               id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">
                            @if(isset($data['id']))
                                Update
                            @else
                                Save
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="password-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="updatePassword">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" wire:model.defer="data.password"
                                           class="form-control form-control-sm @error('data.password') is-invalid @enderror" id="password"
                                           name="password" placeholder="Enter Password" autocomplete="new-password">
                                    @error('data.password')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-sm @error('data.password_confirmation') is-invalid @enderror" wire:model.defer="data.password_confirmation"
                                           id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
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

        window.livewire.on('createUserModal', () => {
            $('#user-modal').modal('show');
        });

        window.livewire.on('editUserModal', () => {
            $('#user-modal').modal('show');
        });

        window.livewire.on('editPasswordModal', () => {
            $('#password-modal').modal('show');
        });

        window.livewire.on('failedMessage', (message) =>{
            Notiflix.Notify.failure(message);
        });

        window.livewire.on('changeStatus', (user_id) => {
            Notiflix.Confirm.show(
                'Change Status',
                'Are you sure you want to change status?',
                'Yes',
                'No',
                function () {
                    @this.changeStatus(user_id)
                        Notiflix.Notify.success('User status has been changed successfully');
                }
            );
        });
    </script>
@endpush
