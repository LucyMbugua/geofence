<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\geolocationRequest;
use App\Models\GeoLocation;
use App\Models\County;
use App\Models\SubCounty;
use Response;
use Auth;

class GeoLocationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//	Get all geolocations
		$geolocations = GeoLocation::all();
		return view('geo.geolocation.index', compact('geolocations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	Get all counties
		$counties = County::lists('name', 'id');
		$subCounties = SubCounty::lists('name', 'id');
		return view('geo.geolocation.create', compact('counties', 'subCounties'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(geolocationRequest $request)
	{
		$town = new geolocation;
		$town->code = $request->code;
        $town->name = $request->name;
        $town->email = $request->email;
        $town->address = $request->address;
        $town->in_charge = $request->in_charge;
        $town->operational_status = $request->operational_status;
        $town->latitude = $request->latitude;
        $town->longitude = $request->longitude;
        $town->user_id = Auth::user()->id;
        $town->save();

        return redirect('geolocation')->with('message', 'geolocation created successfully.');
        

        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//show a geolocation
		$geolocation = GeoLocation::find($id);
		//show the view and pass the $town to it
		return view('geo.geolocation.show', compact('geolocation'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//	Get geolocation
		$geolocation = GeoLocation::find($id);
		//	Get all geolocation types
		//get sub counties
		$subCounties = SubCounty::lists('name', 'id');
		//get initial subcounty
		$subCounty =$geolocation->sub_county_id;
		
		

        return view('geo.geolocation.edit', compact('geolocation','subCounties', 'subCounty'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(geolocationRequest $request, $id)
	{
		$town = GeoLocation::findOrFail($id);
       $town->code = $request->code;
        $town->name = $request->name;
        $town->address = $request->address;
        $town->in_charge = $request->in_charge;
        $town->operational_status = $request->operational_status;
        $town->latitude = $request->latitude;
        $town->longitude = $request->longitude;
        $town->user_id = Auth::user()->id;
        $town->save();

        return redirect('geolocation')->with('message', 'geolocation updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

		public function delete($id)
	{
		$geolocation= GeoLocation::find($id);
		$geolocation->delete();
		return redirect('geolocation')->with('message', 'geolocation deleted successfully.');
	}

	public function destroy($id)
	{
		//
	}
	
}
