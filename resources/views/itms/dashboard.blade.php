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
                    <h3 class="font-weight-bold">Homepage for 
                        @if(Auth::user()->usertype == 0) 
                            Manager 
                        @endif
                        
                        @if(Auth::user()->usertype == 2) 
                            Developer
                        @endif
                        {{ Auth::user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">List of Request System from All Business Unit</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Business Unit</th>
                                    <th>Request Type</th>
                                    <th>BU PIC Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($busunit as $bu)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $bu->user->bunit }}</td>
                                    <td class="font-weight-bold">{{ $bu->request }}</td>
                                    <td>{{ $bu->name }}</td>
                                    <td>{{ $bu->description }}</td>
                                    <td>{{ date('d-m-Y', strtotime($bu->created_at)) }}</td>
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
