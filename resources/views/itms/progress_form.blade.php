@extends('layouts.skydash')

@section('pagetitle')
    <title>Developer Progress Form</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Developer Update Progress Form</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Progress form</h4>
                    <form action="{{ route('app.itms.project.progressprocess', $project->proid) }}" method="post">
                    @csrf
                    <input type="hidden" name="project" value="{{ $project->proid }}">
                        
                        <div class="form-group">
                            <label for="status">Progress Status<span style="color: red">*</span></label>
                            <select class="form-control" name="status">
                                <option value="0" @if(old('status', $project->status) == "0") selected @endif)>Ahead Of Schedule</option>
                                <option value="1" @if(old('status') == "1") selected @endif)>On Schedule</option>
                                <option value="2" @if(old('status') == "2") selected @endif)>Delayed</option>
                                <option value="3" @if(old('status') == "3") selected @endif)>Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="progress_date">Progress Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="progress_date" onchange="calcDuration(this.value)" name="progress_date" value="{{ old('progress_date', $project->progress_date) }}" min="{{ now()->format('Y-m-d') }}">
                            @error('progress_date')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="progress_description">Progress Description<span style="color: red">*</span></label>
                            <textarea class="form-control" name="progress_description" value="{{ old('progress_description', $project->progress_description) }}"
                                rows="5"></textarea>
                            @error('description')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
            
                        <a href="{{ route('app.itms.project.index') }}" class="btn btn-info">Cancel</a>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection