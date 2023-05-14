@extends('layout.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Project</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Project Name <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" placeholder="Enter Project Name" required class="form-control form-control-sm @error('name') is-invalid @enderror">
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug <span class="text-danger">*</span></label>
                                        <input type="text" id="slug" name="slug" placeholder="Enter Project Slug Name" required class="form-control form-control-sm @error('slug') is-invalid @enderror">
                                    </div>
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Project Description <span class="text-danger">*</span></label>
                                        <textarea id="description" name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" rows="4" placeholder="Enter Project Description" required></textarea>
                                    </div>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                        <input type="date" id="start_date" name="start_date" required class="form-control form-control-sm @error('start_date') is-invalid @enderror">
                                    </div>
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date <span class="text-danger">*</span></label>
                                        <input type="date" id="end_date" name="end_date" required class="form-control form-control-sm @error('end_date') is-invalid @enderror">
                                    </div>
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Avatar Image <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="avatar_image" class="custom-file-input" accept="image/*" id="avatar_image"
                                                       onchange="validFileSize($(this),{{ config('setting.avatar_image.size') }})" required>
                                                <label class="custom-file-label" for="avatar_image">Choose file</label>
                                            </div>
                                            @error('avatar_image')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <small class="text-red">* Max Filesize {{config('setting.avatar_image.size')}} kilobytes </small><br>
                                    <small class="text-red">* Image dimension must be {{config('setting.avatar_image.width')}}X{{config('setting.avatar_image.height')}} px</small>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Background Image <span class="text-danger">*</span></label>
                                        <div class="form-group clearfix">
                                            <div class="custom-file">
                                                <input type="file" name="bg_image" class="custom-file-input" accept="image/*" id="bg_image"
                                                       onchange="validFileSize($(this),{{ config('setting.bg_image.size') }})" required>
                                                <label class="custom-file-label" for="bg_image">Choose file</label>
                                            </div>
                                            @error('bg_image')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <small class="text-red">* Max Filesize {{config('setting.bg_image.size')}} kilobytes </small><br>
                                    <small class="text-red">* Image dimension must be {{config('setting.bg_image.width')}}X{{config('setting.bg_image.height')}} px</small>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <img id="default_avatar" class="img-fluid img-thumbnail" src="{{ asset(config('setting.default_image')) }}" alt="" style="height:200px; width: 200px;">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <img id="default_bg" class="img-fluid img-thumbnail" src="{{ asset(config('setting.default_banner')) }}" alt="" style="height:200px; width: 100%;">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary float-right" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function()
        {
            function readURL(input, elementID) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#'+elementID).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#bg_image").change(function(){
                readURL(this, 'default_bg');
            });

            $("#avatar_image").change(function(){
                readURL(this, 'default_avatar');
            });
        });

        function validFileSize($this, size) {
            let fileInfo = $this[0].files[0];
            if ((fileInfo.size/1024) > size) {
                $this.val('');
                $this.nextAll('.invalid').remove();
                if (fileInfo.type === "application/pdf") {
                    $this.after("<span class='invalid' style='color: red;font-size: 12px' '><strong>The PDF must not be greater than " + size + " kilobytes.</strong></span>");
                } else {
                    $this.after("<span class='invalid' style='color: red;font-size: 12px' '><strong>The image must not be greater than " + size + " kilobytes.</strong></span>");
                }
            } else {
                $this.nextAll('.invalid').remove();
            }
        }
    </script>
@endsection
