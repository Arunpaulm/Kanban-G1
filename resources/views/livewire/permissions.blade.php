<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight: initial;">Add Permissions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2">
                            <label>Role Name</label>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="form-group">
                                <select id="role" wire:change="changeRole($event.target.value)" class="form-control form-control-sm @error('role_id') is-invalid @enderror" required>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($role_id)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="all_permission" wire:click="$emit('all_permission')" @if($allPermission) checked @endif>
                                <label for="all_permission" class="custom-control-label" style="font-weight: initial;">All Permission</label>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($permissions->groupBy('group_name') as $key => $group_permission)
                                <div class="col-xs-12 col-sm-3">
                                    <div class="custom-control custom-checkbox">
                                        <input class="groups custom-control-input" type="checkbox" id="group_{{ $key }}" @if(in_array($key, $groupList)) checked @endif
                                        wire:click='$emit("group_permission", "{{ $key }}")'>
                                        <label for="group_{{ $key }}" class="custom-control-label">{{ ucfirst($key) }}</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <ul class="permission-child">
                                        @foreach($group_permission as $permission)
                                            <li style="list-style-type: none;">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="permission_names custom-control-input permission_{{ $key }}" type="checkbox" id="permission_{{ $permission->id }}"
                                                           wire:click='setSinglePermission("{{ $permission->id }}", "{{ $permission->name }}")' @if(in_array($permission->id, $permissionList)) checked @endif>
                                                    <label for="permission_{{ $permission->id }}" class="custom-control-label" style="font-weight: initial;">{{ ucfirst($permission->name) }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @can('update-role-permission')
                        <div class="card-footer clearfix">
{{--                            <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="savePermission()">Save</button>--}}
                            <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="$emit('confirmationPrompt')">Save</button>
                        </div>
                    @endcan
                </div>
            @endif
        </div>
    </div>
</div>


@push('livewire-scripts')
    <script>
        window.livewire.on('all_permission', () => {
            if($("#all_permission").is(':checked')){
                $('.groups').prop('checked', true);
                $('.permission_names').prop('checked', true);
            @this.setAllPermission();
            }
            else
            {
                $('.groups').prop('checked', false);
                $('.permission_names').prop('checked', false);
            @this.unsetAllPermission();
            }
        });

        window.livewire.on('group_permission', (group_name) => {
            if($("#group_"+group_name).is(':checked'))
            {
                $('.permission_'+group_name).prop('checked', true);
            @this.setAllGroupPermission(group_name)
            }
            else
            {
                $('.permission_'+group_name).prop('checked', false);
            @this.unsetAllGroupPermission(group_name)
            }
        });

        window.livewire.on('confirmationPrompt', () => {
            Notiflix.Confirm.show(
                'Access Control',
                'Are you sure you want to add or remove this access?',
                'Yes',
                'No',
                function () {
                    @this.savePermission()
                }
            );
        });

        window.livewire.on('flashMessage', (message) => {
            Notiflix.Notify.success(message);
        });
        window.livewire.on('failedMessage', (message) => {
            Notiflix.Notify.failure(message);
        });
    </script>
@endpush
