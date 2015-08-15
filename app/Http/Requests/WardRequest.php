<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Ward;

class WardRequest extends Request {

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
            'name'   => 'required|unique:wards,name,'.$id,
            'sub_county_id'   => 'required:wards,sub_county_id,'.$id,
        ];
	}
	/**
	* @return \Illuminate\Routing\Route|null|string
	*/
	public function ingnoreId(){
		$id = $this->route('ward');
		$name = $this->input('name');
		return Ward::where(compact('id', 'name'))->exists() ? $id : '';
	}

}
