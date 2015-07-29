@section("sidebar")


    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            <!-- /input-group -->
        </li>
       
        <li>
            <a href="#"><i class="fa fa-database"></i> {!! Lang::choice('messages.geofence-configuration', 1) !!}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{!! url('geofence') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.geofence', 2) !!}</a></li>
                <li><a href="{!! url('county') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.county', 2) !!}</a></li>
                <li><a href="{!! url('subCounty') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.sub-county', 2) !!}</a></li>
            </ul>
        </li>
         <!-- User management -->
        <li>
            <a href="#"><i class="fa fa-users"></i> {!! Lang::choice('messages.user-management', 1) !!}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{!! url('user') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.user', 2) !!}</a></li>
                <li><a href="{!! url('role') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.role', 2) !!}</a></li>
                <li><a href="{!! url('permission') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.permission', 2) !!}</a></li>
                <li><a href="{!! url('privilege') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.privilege', 2) !!}</a></li>
                <li><a href="{!! url('authorization') !!}"><i class="fa fa-tag"></i> {!! Lang::choice('messages.authorization', 2) !!}</a></li>
            </ul>
        </li>
    </ul>
@show
