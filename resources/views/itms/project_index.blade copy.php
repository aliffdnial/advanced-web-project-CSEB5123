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
                    <p class="card-title mb-0">List of Project System from All Business Unit</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Business Unit</th>
                                    <th>Type</th>
                                    <th>PIC Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($projects as $pro)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pro->user->businessunit }}</td>
                                    <td class="font-weight-bold">{{ $pro->requesttype }}</td>
                                    
                                    <td>{{ $pro->picname }}</td>
                                    <td>{{ $pro->description }}</td>
                                    <td>
                                        @if($pro->status == 0)
                                            <div class="badge badge-warning">Pending</div>
                                        @elseif($pro->status == 1)
                                            <div class="badge badge-success">Accepted</div>
                                        @else
                                            <div class="badge badge-danger">Rejected</div>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($pro->created_at)) }}</td>
                                    <td>
                                        <form action="{{ route('app.itms.project.update', $pro->id) }}" method="post">
                                            <input type="hidden" name="_method" value="PUT">
                                            @csrf
                                            <!-- Disable Admin to Approve Button if start_date greater than current_date -->
                                            @if($pro->status == 3 ) 
                                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm" disabled>Approved</button>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm" disabled>Rejected</button>
                                            @elseif($pro->status == 2 || $pro->status == 3 || $pro->status == 4 || $pro->status == 6) <!-- Status Approve,Reject,Past,Cancel Approved -->
                                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm" disabled>Approved</button>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm" disabled>Rejected</button>
                                            @else
                                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approved</button>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Rejected</button>
                                            @endif
                                        </form>
                                        <form action="{{ route('app.itms.project.destroy', $pro->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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