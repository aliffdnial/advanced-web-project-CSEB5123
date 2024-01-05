@extends('layouts.skydash_bu')

@section('pagetitle')
    <title>BU Application Index</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">List of {{ Auth::user()->businessunit }} Application</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('app.bu.create') }}" class="btn btn-primary">Create New Application</a>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>PIC Name</th>
                            <th>Request Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($bus as $bu)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($bu->created_at)) }}</td>
                            <td>{{ $bu->name }}</td>
                            <td>{{ $bu->request }}</td>
                            <td>{{ $bu->description }}</td>
                            <td>
                            @if($bu->status == 1 || $bu->status == 2) <!-- Status Solved, Rejected -->
                            <a href="{{ route('app.bu.edit', $bu->bunitid) }}" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true">Edit</a>
                            <form action="{{ route('app.bu.destroy', $bu->bunitid) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @else
                            <a href="{{ route('app.bu.edit', $bu->bunitid) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('app.bu.destroy', $bu->bunitid) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
