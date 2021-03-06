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
  <div class="panel-heading"><i class="fa fa-tags"></i> {{ Lang::choice('messages.geofence', 1) }} <span class="panel-btn">
  <a class="btn btn-sm btn-info" href="{{ URL::to("geofence/" . $geofence->id . "/edit") }}" >
    <i class="fa fa-edit"></i><span>{{ Lang::choice('messages.edit-geofence', 1) }}</span>
  </a>
  </span></div>
  <div class="panel-body">
    <div class="panel panel-default">
      <div class="panel-body">
           <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.location', 1) }}:</strong> <span> {{ $geofence->geo_location_id }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.longitude', 1) }}:</strong> <span> {{ $geofence->longitude}}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.latitude', 1) }}:</strong> <span> {{ $geofence->latitude }}</span>
        </h5>
        </div>
  </div>
</div>
</div>
@stop