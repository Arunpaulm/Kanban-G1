@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-6"></div>
        </div>
        <section class="content">
            <div class="card card-solid">
                <div class="card-header">
                    <h3 class="card-title">All Projects</h3>
                    @can('project-create')
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('project.create') }}">
                            Create Project
                        </a>
                    @endcan
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
{{--                                        Digital Strategist--}}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $project->name }}</b></h2>
                                                <p class="text-muted text-sm"><b>Description: </b> {{ \Illuminate\Support\Str::limit($project->description, 100, $end=' ...') }} </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Start Date: {{ \Carbon\Carbon::parse($project->start_date)->format('d-M-Y') }}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> End Date: {{ \Carbon\Carbon::parse($project->end_date)->format('d-M-Y') }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($project->avatar_image) }}" alt="user-avatar" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('project.board', $project->slug) }}" class="btn btn-sm bg-teal">
                                                <i class="fas fa-clipboard mr-1"></i> View Board
                                            </a>
                                            @can('view-project')
                                                <a href="{{ route('project.details', $project->slug) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-info mr-1"></i> View Details
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection
