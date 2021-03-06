<?php
use App\Models\User;
use App\Models\geofence;
use App\Http\Controllers\geofenceController;
use App\Http\Requests\geofenceRequest;
use \Mockery as m;

class geofenceControllerTest extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	public function setUp()
	{
		parent::setUp();
		Artisan::call('migrate');
		Artisan::call('db:seed');
		$this->setVariables();

	}
	public function setVariables(){
		// Initial sample storage data
		$this->input = array(
			
			'code' => '367',
			'name' => 'Bungoma Hospital',
			'geofence_type_id' => '13',
			'geofence_owner_id' => '3',
			'description' => 'MOH',
			'nearest_town' => 'Bungoma',
			'landline' => '020546797',
			'fax' => '6786',
			'mobile' => '0789657456',
			'email' => 'bg@gmail.com',
			'address' => '1234, Bungoma',
			'town_id' => '3',
			'in_charge' => 'Dr. Ann',
			'title_id' => '1',
			'operational_status' => '1',
			
			
			
		);

		// Edition sample data
		$this->inputUpdate = array(
			
			'code' => '367',
			'name' => 'Bungoma Hospital',
			'geofence_type_id' => '13',
			'geofence_owner_id' => '3',
			'description' => 'MOH',
			'nearest_town' => 'Bungoma',
			'landline' => '020546797',
			'fax' => '6786',
			'mobile' => '0789657456',
			'email' => 'bung@gmail.com',
			'address' => '1234, Bungoma',
			'town_id' => '3',
			'in_charge' => 'Dr. Ann',
			'title_id' => '1',
			'operational_status' => '1',
						
		);
	}
	public function tearDown(){
		m::close();
	}
	public function testIndex(){
		$this->geofenceMock = Mockery::mock('geofence');
		$this->geofenceMock->shouldReceive('geofence')->once();
		$this->app->instance('geofence', $this->geofenceMock);
		$this->call('GET', 'facilities');
	}

}