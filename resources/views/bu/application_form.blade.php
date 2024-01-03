@extends('layouts.skydash_bu')

@section('pagetitle')
    <title>BU Application Form</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">List of {{ Auth::user()->name }} Unit Application</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12 grid-margin stretch-card"><div class="card">
        <div class="card-body">
            <h4 class="card-title">Application form</h4>
            @if($bu->bunitid)<!-- TO CHECK id ALREADY EXIST OR NOT -->
            <form action="{{ route('app.bu.update', $bu->bunitid) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('app.bu.store') }}" method="post">
            @endif
            @csrf
            <form class="forms">
                <div class="form-group">
                    <label for="name">PIC Name<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $bu->name) }}">
                    @error('name')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="request">Request Type <span style="color: red">*</span></label>
                    <select class="form-control" name="request">
                        <option value="">-- Please Select --</option>
                        <option value="newsystem" @if(old('request') == "newsystem") selected @endif)>New System</option>
                        <option value="enhancement" @if(old('request') == "enhancement") selected @endif)>Enhancement On Existing System</option>
                    </select>
                    @error('request')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="description" value="{{ old('description', $bu->description) }}"
                        rows="5"></textarea>
                    @error('description')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <a href="{{ route('app.bu.index') }}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection