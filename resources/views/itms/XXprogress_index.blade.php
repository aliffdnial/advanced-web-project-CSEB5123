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
                        <a href="{{ route('app.itms.project.create') }}" class="btn btn-primary">Update Progress</a>
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th><th>Progress Date</th><th>Progress Status</th><th>Progress Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($projects as $pro)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pro->project->businessUnit->user->bunit }}</td>
                                    <td>{{ $pro->project->businessUnit->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($pro->project->start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($pro->project->end_date)) }}</td>
                                    <td>{{ $pro->project->duration }}</td>
                                    <td>{{ $pro->methodology }}</td>
                                    <td>{{ $pro->platform }}</td>
                                    <td>{{ $pro->deployment }}</td>
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