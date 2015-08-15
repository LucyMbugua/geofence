<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\WardRequest;
use App\Models\Ward;
use App\Models\SubCounty;
use Response;
use Auth;

class WardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//	Get all wards
		$wards = Ward::all();
		
		return view('geo.ward.index', compact('wards'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	Get all sub counties for select list
		$subCounties = SubCounty::lists('name', 'id');
		return view('geo.ward.create', compact('subCounties'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(WardRequest $request)
	{
		$ward = new Ward;
        $ward->name = $request->name;
        $ward->description = $request->description;
        $ward->sub_county_id = $request->sub_county_id;
        $ward->user_id = Auth::user()->id;;
        $ward->save();

        return redirect('ward')->with('message', 'Ward created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//show a ward
		$ward = Ward::find($id);
		//show the view and pass the $ward to it
		return view('geo.ward.show', compact('ward'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//	Get ward
		$ward = Ward::find($id);
		//	Get all subcounties
		$subCounties = SubCounty::lists('name', 'id');
		//	Get initially selected county
		$subCounty = $ward->sub_county_id;

        return view('geo.ward.edit', compact('ward', 'subCounties', 'subCounty'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(WardRequest $request, $id)
	{
		$ward = Ward::findOrFail($id);;
        $ward->name = $request->name;
        $ward->description = $request->description;
        $ward->sub_county_id = $request->sub_county_id;
        $ward->user_id = Auth::user()->id;;
        $ward->save();

        return redirect('ward')->with('message', 'Ward updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$ward= Ward::find($id);
		$ward->delete();
		return redirect('ward')->with('message', 'Ward deleted successfully.');
	}

	public function destroy($id)
	{
		//
	}

}
