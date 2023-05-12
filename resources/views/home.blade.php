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

    <div class="row">
        @if(count($projects) > 0)
            <div class="col-12">
                <h3>Your Projects</h3>
            </div>

            <div class="col-12 col-md-6">
                @foreach($projects as $project)
                    <div class="card">
                        <a href="{{ route('project.details', $project->slug) }}"><div class="card-header text-center">{{ $project->name }}</div></a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
