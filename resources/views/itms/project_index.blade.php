@extends('layouts.skydash')

@section('pagetitle')
@if(Auth::user()->usertype == 0) 
    <title>ITMS Project & System</title>
@endif
                        
@if(Auth::user()->usertype == 2) 
    <title>ITMS Progress</title>
    @endif
{{ Auth::user()->name }}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">List of Project System from All Business Unit</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @can('isManager')
                        <a href="{{ route('app.itms.project.create') }}" class="btn btn-primary">Assign Project & System</a>
                        @endcan
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th><th>Business Unit</th><th>PIC Name</th><th>Start Date</th><th>End Date</th><th>System Methodology</th><th>Platform</th><th>Deployment</th><th>Status</th><th>Progress Date</th><th>Progress Description</th><th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($systems as $sys)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $sys->project->businessUnit->user->bunit }}</td>
                                    <td>{{ $sys->project->businessUnit->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($sys->project->start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($sys->project->end_date)) }}</td>
                                    <td>{{ $sys->methodology }}</td>
                                    <td>{{ $sys->platform }}</td>
                                    <td>{{ $sys->deployment }}</td>
                                    <td>
                                        @if($sys->project->status == 0)
                                            <div class="badge badge-info">Ahead Of Schedule</div>
                                        @elseif($sys->project->status == 1)
                                            <div class="badge badge-primary">On Schedule</div>
                                        @elseif($sys->project->status == 3)
                                            <div class="badge badge-success">Completed</div>
                                        @else
                                            <div class="badge badge-danger">Delayed</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($sys->project->progress_date)
                                            {{ date('d-m-Y', strtotime($sys->project->progress_date)) }}
                                        @else
                                            No progress date yet
                                        @endif
                                    </td>
                                    <td>{{ $sys->project->progress_description }}</td>
                                    <td>
                                        @if($sys->project->status == 3)
                                            @can('isManager')
                                            <a href="{{ route('app.itms.project.show', $sys->proid) }}" class="btn btn-info" >Details</a>
                                            @endcan
                                            @can('isADev')
                                                <a href="{{ route('app.itms.project.progress', $sys->proid) }}" class="btn btn-warning btn-sm disabled" role="button" aria-disabled="true">Update Progress</a>
                                            @endcan
                                        @else
                                            @can('isManager')
                                            <a href="{{ route('app.itms.project.show', $sys->proid) }}" class="btn btn-info">Details</a>
                                            @endcan
                                            @can('isADev')
                                                <a href="{{ route('app.itms.project.progress', $sys->proid) }}" class="btn btn-warning {{ auth()->user()->userid != $sys->project->user->userid ? 'disabled' : '' }}">Update Progress</a>
                                            @endcan
                                        @endif
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
@endsection