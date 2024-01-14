@extends('layouts.skydash')

@section('pagetitle')
    <title>ITMS Dashboard</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Project & System Details</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <tr>
                                <td>Business Unit</td>
                                <td>{{ $project->businessUnit->user->bunit }}</td>
                            </tr>
                            <tr>
                                <td>PIC Name</td>
                                <td>{{ $project->businessUnit->name }}</td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td>{{ date('d-m-Y', strtotime($project->end_date)) }}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>{{ $project->duration }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if($project->status == 0)
                                        <div class="badge badge-info">Ahead Of Schedule</div>
                                    @elseif($project->status == 1)
                                        <div class="badge badge-primary">On Schedule</div>
                                    @elseif($project->status == 3)
                                        <div class="badge badge-success">Completed</div>
                                    @else
                                        <div class="badge badge-danger">Delayed</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Progress Date</td>
                                <td>
                                    @if($project->progress_date)
                                        {{ date('d-m-Y', strtotime($project->progress_date )) }}
                                    @else
                                        No progress date yet
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Progress Description</td>
                                <td>
                                    @if($project->progress_description)
                                        {{ $project->progress_description }}
                                    @else
                                        No progress description yet
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Lead Developer</td>
                                <td>{{ $project->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Developers</td>
                                <td>
                                    <table class="table table-bordered mb-4">
                                        @php($i=1)
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                        </tr>
                                        @if ($project->developers)
                                            @foreach($project->developers as $dev)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $dev->name }}</td>
                                                <td>{{ $dev->email }}</td>
                                                <td>{{ $dev->phonenum }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <p>No developers assigned yet.</p>
                                        @endif
                                    </table>
                                    <form method="post" action="{{ route('app.itms.project.attachDevelopers', $project) }}">
                                        @csrf
                                        <select name="developer_ids[]" class="form-select" multiple>
                                            @foreach($availableDevelopers as $developer)
                                                <option value="{{ $developer->userid }}">{{ $developer->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="submit" class="btn btn-warning" value="Attach Developers">
                                    </form>

                                    <form method="post" action="{{ route('app.itms.project.detachDevelopers', $project) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Detach All Developers</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-warning " href="{{route('app.itms.project.index')}}">Back</a>
    </div>
</div>
@endsection