<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model {
	use SoftDeletes;
 	protected $dates = ['deleted_at'];
 	protected $table = 'wards';

	
	/**
	* Relationship with subcounty
	*/
	public function subCounty()
	{
		return $this->belongsTo('App\Models\SubCounty');
	}

}