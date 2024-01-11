@extends('layouts.skydash_bu')

@section('pagetitle')
    <title>BU Profile Index</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">{{ Auth::user()->businessunit }} Profile</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No</th><th>Date</th><th>Name</th><th>Phone Number</th><th>Business Unit</th><th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($profile->created_at)) }}</td>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->phonenum }}</td>
                            <td>{{ $profile->bunit }}</td>
                            <td>
                            <a href="{{ route('app.profile.edit', $profile->userid) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('app.profile.destroy', $profile->userid) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
