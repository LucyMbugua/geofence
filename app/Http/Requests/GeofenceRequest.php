<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Town;
use App\Models\Geofence;

class GeofenceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->ingnoreId();
		return [
		'latitude'=> 'required',
				
        ];
	}
	/**
	* @return \Illuminate\Routing\Route|null|string
	*/
	public function ingnoreId(){
		$id = $this->route('geofence');
		$latitude = $this->input('latitude');
		return Geofence::where(compact('id', 'latitude'))->exists() ? $id : '';
	}

}
