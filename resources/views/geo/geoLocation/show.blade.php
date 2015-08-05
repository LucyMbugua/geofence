@extends("layout")
@section("content")
<br />
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <a href="#"><i class="fa fa-dashboard"></i> {{ Lang::choice('messages.dashboard', 1) }}</a>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><i class="fa fa-tags"></i> {{ Lang::choice('messages.geolocation', 1) }} <span class="panel-btn">
  <a class="btn btn-sm btn-info" href="{{ URL::to("geolocation/" . $geolocation->id . "/edit") }}" >
    <i class="fa fa-edit"></i><span>{{ Lang::choice('messages.edit-geolocation', 1) }}</span>
  </a>
  </span></div>
  <div class="panel-body">
    <div class="panel panel-default">
      <div class="panel-body">
           
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.sub-county', 1) }}:</strong> <span> {{ $geolocation->subCounty->name}}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.name', 1) }}:</strong> <span> {{ $geolocation->name }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.nearest-town', 1) }}:</strong> <span> {{ $geolocation->nearest_town }}</span>
        </h5>
       
        </div>
  </div>
</div>
</div>
@stop