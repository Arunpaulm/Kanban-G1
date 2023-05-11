<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Roles</h3>
                        @can('role-create')
                            <button type="button" class="btn btn-sm btn-primary float-right" wire:click="createRole()">
                                Add New Role
                            </button>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="example2" class="text-center table table-sm table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                {{--                                                <th>Guard Name</th>--}}
                                                <th width="60%">Permissions</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($roles as $key => $role)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ ++$key }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    {{--                                                    <td>{{ ucfirst($role->guard_name) }}</td>--}}
                                                    <td>
                                                        @if(count($role->permissions))
                                                            @foreach($role->permissions as $permission)
                                                                <div class="badge badge-success">{{ ucfirst($permission->name) }}</div>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($role->updated_at)->format("d-m-Y h:m A") }}</td>
                                                    <td>
                                                        @can('role-edit')
                                                            <a class="btn btn-outline-warning btn-sm" wire:click="editRole({{ $role->id }})"><i class="fas fa-pencil-alt fa-sm"></i></a>
                                                        @endcan
                                                        {{--                                                        <a class="btn btn-outline-danger btn-sm" wire:click="$emit('confirmDelete', {{ $role->id }})"><i class="fas fa-trash fa-sm"></i></a>--}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="role-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if(isset($data['id']))
                            Edit Role
                        @else
                            Add New Role
                        @endif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="@if(isset($data['id'])) updateRole @else storeRole @endif">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('data.name') is-invalid @enderror" id="name"
                                   wire:model.defer="data.name" required placeholder="Role Name">
                            @error('data.name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--						<div class="form-group">--}}
                        {{--							<label for="guard_name" class="col-form-label">Guard Name <span class="text-danger">*</span></label>--}}
                        {{--							<select class="form-control form-control-sm @error('data.guard_name') is-invalid @enderror" wire:model.defer="data.guard_name" required>--}}
                        {{--									<option selected value="">Select Guard Type</option>--}}
                        {{--								@foreach(config('setting.guard_name') as $guard_name)--}}
                        {{--									<option value="{{ $guard_name }}">{{ ucfirst($guard_name) }}</option>--}}
                        {{--								@endforeach--}}
                        {{--							</select>--}}
                        {{--							@error('data.guard_name')--}}
                        {{--							<span class="invalid-feedback" role="alert">{{ $message }}</span>--}}
                        {{--							@enderror--}}
                        {{--						</div>--}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">@if(isset($data['id']))
                                Update
                            @else
                                Save
                            @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('livewire-scripts')
    <script>
        $(document).ready(function ()
        {
            loadDatatable();
        });

        function loadDatatable()
        {
            $("#example2").dataTable({
                "ordering": false
            });
        }

        function destroyDatatable()
        {
            $("#example2").DataTable().destroy();
        }

        window.livewire.on('closeModal', (message) => {
            destroyDatatable();
            $('#role-modal').modal('hide');
            Notiflix.Notify.success(message);
        @this.render();
            setTimeout(function(){
                loadDatatable();
            }, 50);
        });

        window.livewire.on('roleModal', () => {
            destroyDatatable();
            $('#role-modal').modal('show');
            loadDatatable();
        });

        window.livewire.on('failedMessage', (message) => {
            destroyDatatable();
            Notiflix.Notify.failure(message);
            $('#role-modal').modal('hide');
            loadDatatable();
        });

        window.livewire.on('confirmDelete', (role_id) => {
            Notiflix.Confirm.show(
                'Delete Confirm',
                'Are you sure you want to Delete?',
                'Yes',
                'No',
                function () {
                    destroyDatatable();
                @this.deleteRole(role_id)
                    Notiflix.Notify.success('Role has been deleted successfully');
                }
            );
        });

        window.addEventListener('contentChanged', event => {
            loadDatatable();
        });
    </script>
@endpush
