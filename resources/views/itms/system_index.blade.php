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
                    <h3 class="font-weight-bold">List of System Development Information for All Project</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('app.itms.system.create') }}" class="btn btn-primary">System Development</a>
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Project ID</th>
                                    <th>System Methodology</th>
                                    <th>System Platform</th>
                                    <th>System Deployment Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($systems as $system)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $system->proid }}</td>
                                    <td>{{ $system->methodology }}</td>
                                    <td>{{ $system->platform }}</td>
                                    <td>{{ $system->deployment }}</td>
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