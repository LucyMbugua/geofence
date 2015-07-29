<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Geofence extends Model {
	use SoftDeletes;
 	protected $dates = ['deleted_at'];
 	protected $table = 'geofences';

	}