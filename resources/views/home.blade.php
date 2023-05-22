@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">Welcome {{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $taskSummery->total_task }}</h3>
                    <p>Total Tasks</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $taskSummery->total_to_do_task }}</h3>
                    <p>To Do Tasks</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $taskSummery->total_in_progress_task }}</h3>
                    <p>In Process Tasks</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $taskSummery->total_completed_task }}</h3>
                    <p>Complete Task</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row-12">
        @if(count($projects) > 0)
            <section class="content">
                <div class="card card-solid">
                    <div class="card-header">
                        <h3 class="card-title">Your Projects</h3>
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
        @endif
    </div>
</div>
@endsection
