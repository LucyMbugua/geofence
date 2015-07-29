<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GeofenceRequest;
use App\Models\Geofence;
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
		$counties = County::lists('name', 'id');
		$subCounties = SubCounty::lists('name', 'id');
		return view('geo.geofence.create', compact('counties', 'subCounties'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(GeofenceRequest $request)
	{
		$town = new Geofence;
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
		//show the view and pass the $town to it
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
		$subCounties = SubCounty::lists('name', 'id');
		//get initial subcounty
		$subCounty =$geofence->sub_county_id;
		
		

        return view('geo.geofence.edit', compact('geofence','subCounties', 'subCounty'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(GeofenceRequest $request, $id)
	{
		$town = Geofence::findOrFail($id);
       $town->code = $request->code;
        $town->name = $request->name;
        $town->address = $request->address;
        $town->in_charge = $request->in_charge;
        $town->operational_status = $request->operational_status;
        $town->latitude = $request->latitude;
        $town->longitude = $request->longitude;
        $town->user_id = Auth::user()->id;
        $town->save();

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
