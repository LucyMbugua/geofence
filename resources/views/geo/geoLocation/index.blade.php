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

@if(Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-tags"></i> {{ Lang::choice('messages.geolocation', 2) }} <span class="panel-btn">
      <a class="btn btn-sm btn-info" href="{{ URL::to("geolocation/create") }}" >
        <span class="glyphicon glyphicon-plus-sign"></span>
            {{ trans('messages.create-geolocation') }}
          </a>
         </span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover search-table">
                    <thead>
                        <tr>
                            <th>{{ Lang::choice('messages.name', 1) }}</th>
                            <th>{{ Lang::choice('messages.county', 1) }}</th>
                            <th>{{ Lang::choice('messages.sub-county', 1) }}</th>
                            <th>{{ Lang::choice('messages.nearest-town', 1) }}</th>
                            
                                                    
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($geolocations as $geolocation)
                        <tr>
                            <td>{!! $geolocation->name !!}</td>
                            <td>{!! $geolocation->County !!}</td>
                            <td>{!! $geolocation->subCounty->name!!}</td>
                            <td>{!! $geolocation->nearest_town !!}</td>
                                                     
                            <td>
                              <a href="{!! url("geolocation/" . $geolocation->id) !!}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i><span> View</span></a>
                              <a href="{!! url("geolocation/" . $geolocation->id . "/edit") !!}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><span> Edit</span></a>
                              <a href="{!! url("geolocation/" . $geolocation->id . "/delete") !!}" class="btn btn-warning btn-sm"><i class="fa fa-trash-o"></i><span> Delete</span></a>
                                                       </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="3">{{ Lang::choice('messages.no-records-found', 1) }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ Session::put('SOURCE_URL', URL::full()) }}
        </div>
      </div>
</div>
@stop