@extends("layout")
@section("content")
<br />
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> {{ Lang::choice('messages.dashboard', 1) }}
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-tags"></i> {{ Lang::choice('messages.create-geofence', '1') }}</div>
    <div class="panel-body">
        <div class="col-lg-6 main">
            <!-- Begin form --> 
            @if($errors->all())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {!! HTML::ul($errors->all(), array('class'=>'list-unstyled')) !!}
            </div>
            @endif
            {!! Form::open(array('route' => 'geofence.store', 'id' => 'form-add-geofence', 'class' => 'form-horizontal')) !!}
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                 <div class="form-group">
                    {!! Form::label('geo_location_id', Lang::choice('messages.location', 1), array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('geo_location_id', array(''=>trans('messages.select-location'))+$locations,'', 
                            array('class' => 'form-control', 'id' => 'geo_location_id')) !!}
                    </div>
                </div>
                 <div class="form-group">
                    {!! Form::label('latitude', Lang::choice('messages.latitude', 1), array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                         {!! Form::text('latitude', Input::old('latitude'), array('class' => 'form-control')) !!}
                   </div>
                </div>
                <div class="form-group">
                    {!! Form::label('longitude', Lang::choice('messages.longitude', 1), array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                       {!! Form::text('longitude', Input::old('longitude'), array('class' => 'form-control')) !!}
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::button("<i class='glyphicon glyphicon-ok-circle'></i> ".Lang::choice('messages.save', 1), 
                          array('class' => 'btn btn-success', 'onclick' => 'submit()')) !!}
                          {!! Form::button("<i class='glyphicon glyphicon-remove-circle'></i> ".'Reset', 
                          array('class' => 'btn btn-default', 'onclick' => 'reset()')) !!}
                    <a href="#" class="btn btn-s-md btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> {{ Lang::choice('messages.cancel', 1) }}</a>
                    </div>
                </div>
            {!! Form::close() !!} 
            <!-- End form -->
        </div> 
    </div>
</div>
@stop