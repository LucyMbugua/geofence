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
        <h4 class="no-margn view">
          <strong>{{ Lang::choice('messages.code', 1) }}:</strong> <span> {{ $geofence->code }}</span>
        </h4>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.name', 1) }}:</strong> <span> {{ $geofence->name }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.geofence-type', 1) }}:</strong> <span> {{ $geofence->geofenceType->name}}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.geofence-owner', 1) }}:</strong> <span> {{ $geofence->geofenceOwner->name }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.nearest-town', 1) }}:</strong> <span> {{ $geofence->nearest_town }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.landline', 1) }}:</strong> <span> {{ $geofence->landline }}</span>
        </h5>
        <hr>
         <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.mobile', 1) }}:</strong> <span> {{ $geofence->mobile }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.email', 1) }}:</strong> <span> {{ $geofence->email }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.address', 1) }}:</strong> <span> {{ $geofence->address }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.in-charge', 1) }}:</strong> <span> {{ $geofence->in_charge }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.reporting-site', 1) }}:</strong> <span> {{ $geofence->reporting_site }}</span>
        </h5>
        <hr>
        <h5 class="no-margn">
          <strong>{{ Lang::choice('messages.operational-status', 1) }}:</strong> <span> {{ $geofence->operational_status== App\Models\geofence::OPERATIONAL? Lang::choice('messages.yes', 1):Lang::choice('messages.no', 1) }}</span>
        </h5>
      </div>
  </div>
</div>
</div>
@stop