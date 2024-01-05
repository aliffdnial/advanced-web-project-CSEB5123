@extends('layouts.skydash')

@section('pagetitle')
    <title>System Development Info Form</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">System Development Information Form</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12 grid-margin stretch-card"><div class="card">
        <div class="card-body">
            
            @if($system->sysid)<!-- TO CHECK id ALREADY EXIST OR NOT -->
            <form action="{{ route('app.itms.system.update', $system->sysid) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('app.itms.system.store') }}" method="post">
            @endif
            @csrf
            <form class="forms">
                <div class="form-group">
                    <label for="project">Project <span style="color: red">*</span></label>
                    <select class="form-control" name="proid">
                        @foreach($project as $pro)
                        @foreach($bunit as $b)
                            @if($b->status == 1)
                                <option value="{{ $pro->proid }}">{{ $b->name }} - {{ $b->user->bunit }} - {{ $b->request }} - {{ $b->description }} </option>
                            @endif
                        @endforeach
                        @endforeach
                    </select>
                    @error('bunitid')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="methodology">System Development Methodology<span style="color: red">*</span></label>
                    <select class="form-control" name="methodology">
                        <option value="Agile Development" @if(old('methodology', $system->methodology) == "Agile Development") selected @endif)>Agile Development</option>
                        <option value="Waterfall Development" @if(old('methodology') == "Waterfall Development") selected @endif)>Waterfall Development</option>
                        <option value="Extreme Programming" @if(old('methodology') == "Extreme Programming") selected @endif)>Extreme Programming</option>
                        <option value="Agile Development" @if(old('methodology') == "Agile Development") selected @endif)>Agile Development</option>
                        <option value="Lean Development" @if(old('methodology') == "Lean Development") selected @endif)>Lean Development</option>
                        <option value="Prototyping Methodology" @if(old('methodology') == "Prototyping Methodology") selected @endif)>Prototyping Methodology</option>
                        <option value="Dynamic Systems Development" @if(old('methodology') == "Dynamic Systems Development") selected @endif)>Dynamic Systems Development</option>
                        <option value="Feature Driven Development" @if(old('methodology') == "Feature Driven Development") selected @endif)>Feature Driven Development</option>
                        <option value="Rational Unified Process" @if(old('methodology') == "Rational Unified Process") selected @endif)>Rational Unified Process</option>
                        <option value="Spiral Development Model" @if(old('methodology') == "Spiral Development Model") selected @endif)>Spiral Development Model</option>
                        <option value="Joint Application Development" @if(old('methodology') == "Joint Application Development") selected @endif)>Joint Application Development</option>
                        <option value="Scrum Development" @if(old('methodology') == "Scrum Development") selected @endif)>Scrum Development</option>
                        <option value="Rapid Application Development" @if(old('methodology') == "Rapid Application Development") selected @endif)>Rapid Application Development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="platform">System Platform <span style="color: red">*</span></label>
                    <select class="form-control" name="platform">
                        <option value="web-based" @if(old('platform', $system->platform) == "web-based") selected @endif)>Web-Based</option>
                        <option value="mobile" @if(old('platform') == "mobile") selected @endif)>Mobile</option>
                        <option value="stand-alone system" @if(old('platform') == "stand-alone system") selected @endif)>Stand-Alone System</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deployment">Deployment Type<span style="color: red">*</span></label>
                    <select class="form-control" name="deployment">
                        <option value="cloud" @if(old('deployment', $system->deployment) == "cloud") selected @endif)>Cloud</option>
                        <option value="on-promises" @if(old('deployment') == "on-promises") selected @endif)>On-Promises</option>
                    </select>
                </div>
                <a href="{{ route('app.itms.system.index') }}" class="btn btn-info">Cancel</a>
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