<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GeofenceRequest;
use App\Models\Geofence;
use App\Models\GeoLocation;
use App\Models\County;
use App\Models\SubCounty;
use Response;
use Auth;

class GeofenceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//	Get all geofences
		$geofences = Geofence::all();
		return view('geo.geofence.index', compact('geofences'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	Get all counties
		$locations = GeoLocation::lists('name', 'id');
		
		return view('geo.geofence.create', compact('locations'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(GeofenceRequest $request)
	{
		$fence = new Geofence;
		$fence->geo_location_id = $request->location;
        $fence->latitude = $request->latitude;
        $fence->longitude = $request->longitude;
        $fence->user_id = Auth::user()->id;
        $fence->save();

        return redirect('geofence')->with('message', 'Geofence created successfully.');
        

        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//show a geofence
		$geofence = Geofence::find($id);
		//show the view and pass the $fence to it
		return view('geo.geofence.show', compact('geofence'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//	Get geofence
		$geofence = Geofence::find($id);
		//	Get all geofence types
		//get sub counties
		$locations = GeoLocation::lists('name', 'id');
		//get initial subcounty
		$location =$geofence->geo_location_id;
		
		

        return view('geo.geofence.edit', compact('geofence','locations', 'location'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(GeofenceRequest $request, $id)
	{
		$fence = Geofence::findOrFail($id);
       	$fence->geo_location_id = $request->location;
        $fence->latitude = $request->latitude;
        $fence->longitude = $request->longitude;
        
        $fence->user_id = Auth::user()->id;
        $fence->save();

        return redirect('geofence')->with('message', 'Geofence updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

		public function delete($id)
	{
		$geofence= Geofence::find($id);
		$geofence->delete();
		return redirect('geofence')->with('message', 'Geofence deleted successfully.');
	}

	public function destroy($id)
	{
		//
	}
	
}
