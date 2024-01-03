@extends('layouts.skydash')

@section('pagetitle')
    <title>Manager Assign Project Form</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Assign List of Business Unit Project To Developer</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12 grid-margin stretch-card"><div class="card">
        <div class="card-body">
            <h4 class="card-title">Assign Project form</h4>
            @if($project->id)<!-- TO CHECK id ALREADY EXIST OR NOT -->
            <form action="{{ route('app.itms.project.update', $project->id) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('app.itms.project.store') }}" method="post">
            @endif
            @csrf
            <form class="forms">
                <div class="form-group">
                    <label for="owner">Owner <span style="color: red">*</span></label>
                    <select class="form-control" name="userid">
                        @foreach($bu as $b)
                        @foreach($user as $u)
                            @if($u->usertype == 1)
                            <option value="{{ $u->id }}">{{ $u->businessunit }}</option>
                            @endif
                        @endforeach
                        @endforeach
                    </select>
                    @error('userid')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pic">Person in-charge <span style="color: red">*</span></label>
                    <select class="form-control" name="buid">
                        @foreach($bu as $b)
                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                    @error('buid')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="startdate">Project Start Date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="start_date" onchange="calcDuration(this.value)" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                    @error('start_date')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="end_date">Project End Date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="end_date" onchange="calcDuration(this.value)" name="end_date" value="{{ old('end_date', $project->end_date) }}">
                    @error('end_date')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="duration">Project Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Days" readonly value="{{ old('duration', $project->duration) }}">
                </div>
                <div class="form-group">
                    <label for="status">Project Status <span style="color: red">*</span></label>
                    <select class="form-control" name="status">
                        <option value="0" @if(old('status', $project->status) == "0") selected @endif)>Ahead Of Schedule</option>
                        <option value="1" @if(old('status') == "1") selected @endif)>On Schedule</option>
                        <option value="2" @if(old('status') == "2") selected @endif)>Delayed</option>
                        <option value="3" @if(old('status') == "3") selected @endif)>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="leaddev">Lead Developer <span style="color: red">*</span></label>
                    <select class="form-control" name="leaddev">
                         @foreach($bu as $b) <!-- Business Unit -->
                        @foreach($user as $u) <!-- User -->
                            @if($u->usertype == 2)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endif
                        @endforeach
                        @endforeach
                    </select>
                    @error('leaddev')
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

<script>
function calcDuration() {
    // Get the start_date and end_date values
    var startDateStr = document.getElementById('start_date').value;
    var endDateStr = document.getElementById('end_date').value;

    // Convert the string dates to JavaScript Date objects
    var startDate = new Date(startDateStr);
    var endDate = new Date(endDateStr);

    // Calculate the number of days
    var Duration = (endDate - startDate) / (1000 * 60 * 60 * 24);

    // Display the result
    var obj = document.getElementById('duration');
    obj.value = Duration;
}
</script>
@endsection