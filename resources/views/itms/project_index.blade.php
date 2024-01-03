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
                        <a href="{{ route('app.itms.project.create') }}" class="btn btn-primary">Assign Project</a>
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Business Unit</th>
                                    <th>PIC Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Duration</th>
                                    <th>Lead Developer</th>
                                    <th>Developer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($projects as $pro)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pro->user->bunit }}</td>
                                    <td>{{ $pro->businessUnit->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($pro->start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($pro->end_date)) }}</td>
                                    <td>{{ $pro->duration }}</td>
                                    <td>@foreach($dev as $d)
                                        {{ $d->name }}
                                        @endforeach</td>
                                    <td></td>
                                    <td>
                                        @if($pro->status == 0)
                                            <div class="badge badge-info">Ahead Of Schedule</div>
                                        @elseif($pro->status == 1)
                                            <div class="badge badge-primary">On Schedule</div>
                                        @elseif($pro->status == 3)
                                            <div class="badge badge-success">Completed</div>
                                        @else
                                            <div class="badge badge-danger">Delayed</div>
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