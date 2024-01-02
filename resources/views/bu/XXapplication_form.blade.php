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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if($bu->id)<!-- TO CHECK id ALREADY EXIST OR NOT -->
                    <form action="{{ route('app.business_unit.update', $bu->id) }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @else
                        <form action="{{ route('app.business_unit.store') }}" method="post">
                            @endif
                            @csrf
                
                            <table class="table">
                                <tr>
                                    <th>PIC Name <span style="color: red">*</span></th>
                                    <td>
                                        <input type="text" class="form-control" name="picname"
                                            value="{{ old('picname', $bu->picname) }}">
                                        @error('picname')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Request Type <span style="color: red">*</span></th>
                                    <td>
                                        <select class="form-control" name="requesttype">
                                            <option value="">-- Please Select --</option>
                                            <option value="newsystem">New System</option>
                                            <option value="enhancement">Enhancement</option>
                                        </select>
                                        @error('requesttype')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description <span style="color: red">*</span></th>
                                    <td>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description', $bu->description) }}">
                                        @error('description')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                            <a href="{{ route('app.business_unit.index') }}" class="btn btn-info">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms">
                    <div class="form-group">
                      <label for="picname">PIC Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="requesttype">Request Type <span style="color: red">*</span></label>
                      <select class="form-control" name="requesttype">
                                            <option value="">-- Please Select --</option>
                                            <option value="newsystem">New System</option>
                                            <option value="enhancement">Enhancement</option>
                                        </select>
                                        @error('requesttype')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="description">Description <span style="color: red">*</span></label>
                      <textarea class="form-control" name="description"
                                            value="{{ old('description', $bu->description) }}"rows="4"></textarea>
                                        @error('description')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                      </div>
                    
                    <button class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection