<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if(isset($data['profile_photo']) || isset($data['pre_set_profile_picture']))
                            @if(is_object($data['profile_photo']))
                                <div class="left_profile_img">
                                    <img class="" src="{{ $data['profile_photo']->temporaryUrl() }}" alt="Profile picture">
                                </div>
                            @else
                                <div class="left_profile_img">
                                    <img class="" src="{{ $data['pre_set_profile_picture'] }}" alt="Profile picture">
                                </div>
                            @endif
                        @else
                            <div class="left_profile_img">
                                <img class="" src="{{ asset('assets/img/default.png') }}" alt="Profile picture">
                            </div>
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <div class="text-muted text-center mb-2"><small class="badge badge-info">{{ $user->roles[0]->name ?? 'N/A' }}</small></div>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Name</b> <span class="float-right">{{ $user->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Phone No.</b> <span class="float-right">{{ $user->phone ?? 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <h3 class="card-title">Edit Profile</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-8 order-2 order-md-1">
                            <form wire:submit.prevent="updateUser()">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm @error('data.name') is-invalid @enderror" id="name"
                                               name="name" wire:model.defer="data.name" required placeholder="Enter Name">
                                        @error('data.name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control form-control-sm @error('data.email') is-invalid @enderror" id="email" name="email"
                                               placeholder="Email" wire:model.defer="data.email">
                                        @error('data.email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="contact" class="col-sm-4 col-form-label">Contact No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm @error('data.phone') is-invalid @enderror" id="phone"
                                               name="phone" wire:model.defer="data.phone" placeholder="Enter Phone No.">
                                        @error('data.phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Profile Picture</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" wire:model.defer="data.profile_photo" class="custom-file-input" accept="image/*" id="profile_photo"
                                                       onchange="validFileSize($(this),{{ config('setting.avatar_image.size') }})">
                                                <label class="custom-file-label" for="profile_photo">Choose file</label>
                                            </div>
                                            @error('data.profile_photo')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                            <span id="error_profile_photo" class="invalid-feedback" role="alert"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <div wire:loading wire:target="data.profile_photo">
                                            <div class="upload-custom-loader"></div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-12 col-md-4 order-1 order-md-2">
                            @if(isset($data['profile_photo']) || isset($data['pre_set_profile_picture']))
                                <div class="upload_preview_profile">
                                    @if(is_object($data['profile_photo']))
                                        <div class="img_set">
                                            <img src="{{ $data['profile_photo']->temporaryUrl() }}" alt="Profile picture"
                                                 height="{{ config('setting.avatar_image.height') }}" width="{{ config('setting.avatar_image.width') }}">
                                        </div>
                                    @else
                                        <div class="img_set">
                                            <img src="{{ $data['pre_set_profile_picture'] }}" alt="Profile picture"
                                                 height="{{ config('setting.avatar_image.height') }}" width="{{ config('setting.avatar_image.width') }}">
                                        </div>
                                    @endif
                                </div>
                            @else
                                <img class="img-fluid img-thumbnail" src="{{ asset('assets/img/default.png') }}" alt="Profile picture"
                                     height="{{ config('setting.avatar_image.height') }}" width="{{ config('setting.avatar_image.width') }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- password change card-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updatePassword()">
                        <div class="row">
                            @include('layout.partials.old-password-template')

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('livewire-scripts')
    <script type="text/javascript">
        function validFileSize($this, size) {
            let fileInfo = $this[0].files[0];
            if ((fileInfo.size / 1024) > size) {
                $this.val('');
                $this.nextAll('.invalid').remove();
                if (fileInfo.type === "application/pdf") {
                    $('#error_profile_picture').text('The PDF must not be greater than ' + size + ' kilobytes.');
                } else {
                    $('#error_profile_picture').text('The image must not be greater than ' + size + ' kilobytes.');
                }
            } else {
                $('#error_profile_picture').text('');
                $this.nextAll('.invalid').remove();
            }
        }

        window.livewire.on('flashMessage', (message) => {
            Notiflix.Notify.success(message);
        });
        window.livewire.on('failedMessage', (message) => {
            Notiflix.Notify.failure(message);
        });
    </script>
@endpush
