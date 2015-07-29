<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\Geofence;
use App\Models\GeoLocation;

class GeofenceSeeder extends Seeder
{
    public function run()
    {
        /* Users table */
        $usersData = array(
            array(
                "username" => "admin", "password" => Hash::make("password"), "email" => "admin@hivgeofence.org",
                "name" => "Lucy Mbugua", "gender" => "1", "phone"=>"0722000000", "address" => "P.O. Box 59857-00200, Nairobi"
            )
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('Users table seeded');
        
        /* Roles table */
        $roles = array(
            array("name" => "Superadmin", "display_name" => "Overall Administrator"),
            array("name" => "Admin", "display_name" => "Admin"),
            array("name" => "Data Manager", "display_name" => "Data Manager"),
           
        );
        foreach ($roles as $role) {
            Role::create($role);
        }
        $this->command->info('Roles table seeded');

        $role1 = Role::find(1);
        $permissions = Permission::all();

        //Assign all permissions to role administrator
        foreach ($permissions as $permission) {
            $role1->attachPermission($permission);
        }
        //Assign role Superadmin to all permissions
        User::find(1)->attachRole($role1);

        $role2 = Role::find(4);//Assessor

        //Assign technologist's permissions to role technologist
        $role2->attachPermission(Permission::find(2));
        $role2->attachPermission(Permission::find(3));
        $role2->attachPermission(Permission::find(8));

        //Assign roles to the other users
       
        //  Counties
        $counties = array(
            array("name" => "Baringo", "hq" => "Kabarnet", "user_id" => "1"),
            array("name" => "Bomet", "hq" => "Bomet", "user_id" => "1"),
            array("name" => "Bungoma", "hq" => "Bungoma", "user_id" => "1"),
            array("name" => "Busia", "hq" => "Busia", "user_id" => "1"),
            array("name" => "Elgeyo Marakwet", "hq" => "Iten", "user_id" => "1"),
            array("name" => "Embu", "hq" => "Embu", "user_id" => "1"),
            array("name" => "Garissa", "hq" => "Garissa", "user_id" => "1"),
            array("name" => "Homa Bay", "hq" => "Homa Bay", "user_id" => "1"),
            array("name" => "Isiolo", "hq" => "Isiolo", "user_id" => "1"),
            array("name" => "Kajiado", "hq" => "Kajiado", "user_id" => "1"),
            array("name" => "Kakamega", "hq" => "Kakamega", "user_id" => "1"),
            array("name" => "Kericho", "hq" => "Kericho", "user_id" => "1"),
            array("name" => "Kiambu", "hq" => "Kiambu", "user_id" => "1"),
            array("name" => "Kilifi", "hq" => "Kilifi", "user_id" => "1"),
            array("name" => "Kirinyaga", "hq" => "Kerugoya", "user_id" => "1"),
            array("name" => "Kisii", "hq" => "Kisii", "user_id" => "1"),
            array("name" => "Kisumu", "hq" => "Kisumu", "user_id" => "1"),
            array("name" => "Kitui", "hq" => "Kitui Town", "user_id" => "1"),
            array("name" => "Kwale", "hq" => "Kwale", "user_id" => "1"),
            array("name" => "Laikipia", "hq" => "Nanyuki", "user_id" => "1"),
            array("name" => "Lamu", "hq" => "Lamu", "user_id" => "1"),
            array("name" => "Machakos", "hq" => "Machakos", "user_id" => "1"),
            array("name" => "Makueni", "hq" => "Wote", "user_id" => "1"),
            array("name" => "Mandera", "hq" => "Mandera", "user_id" => "1"),
            array("name" => "Marsabit", "hq" => "Marsabit", "user_id" => "1"),
            array("name" => "Meru", "hq" => "Meru", "user_id" => "1"),
            array("name" => "Migori", "hq" => "Migori", "user_id" => "1"),
            array("name" => "Mombasa", "hq" => "Mombasa", "user_id" => "1"),
            array("name" => "Muranga", "hq" => "Muranga", "user_id" => "1"),
            array("name" => "Nairobi", "hq" => "Nairobi", "user_id" => "1"),
            array("name" => "Nakuru", "hq" => "Nakuru", "user_id" => "1"),
            array("name" => "Nandi", "hq" => "Kapsabet", "user_id" => "1"),
            array("name" => "Narok", "hq" => "Narok", "user_id" => "1"),
            array("name" => "Nyamira", "hq" => "Nyamira", "user_id" => "1"),
            array("name" => "Nyandarua", "hq" => "Ol Kalou", "user_id" => "1"),
            array("name" => "Nyeri", "hq" => "Nyeri", "user_id" => "1"),
            array("name" => "Samburu", "hq" => "Maralal", "user_id" => "1"),
            array("name" => "Siaya", "hq" => "Siaya", "user_id" => "1"),
            array("name" => "Taita Taveta", "hq" => "Voi", "user_id" => "1"),
            array("name" => "Tana River", "hq" => "Hola", "user_id" => "1"),
            array("name" => "Tharaka Nithi", "hq" => "Chuka", "user_id" => "1"),
            array("name" => "Trans Nzoia", "hq" => "Kitale", "user_id" => "1"),
            array("name" => "Turkana", "hq" => "Lodwar", "user_id" => "1"),
            array("name" => "Uasin Gishu", "hq" => "Eldoret", "user_id" => "1"),
            array("name" => "Vihiga", "hq" => "Mbale", "user_id" => "1"),
            array("name" => "Wajir", "hq" => "Wajir", "user_id" => "1"),
            array("name" => "West Pokot", "hq" => "Kapenguria", "user_id" => "1")

        );
        foreach ($counties as $county) {
            County::create($county);
        }
        $this->command->info('Counties table seeded');

        /* sub-counties table */
        $subCounties = array(
            array("name" => "Kiharu", "county_id" => "29", "user_id" => "1"),
            array("name" => "Kandara", "county_id" => "29", "user_id" => "1"),
            array("name" => "Kangema", "county_id" => "29", "user_id" => "1"),
            array("name" => "Muranga", "county_id" => "29", "user_id" => "1"),
            array("name" => "Gatanga", "county_id" => "29", "user_id" => "1"),
            array("name" => "Kigumo", "county_id" => "29", "user_id" => "1"),
            array("name" => "Maragua", "county_id" => "29", "user_id" => "1"),
            array("name" => "Mathioya", "county_id" => "29", "user_id" => "1"),
            array("name" => "Embakasi", "county_id" => "30", "user_id" => "1"),
            array("name" => "Westlands", "county_id" => "30", "user_id" => "1"),
            array("name" => "Starehe", "county_id" => "30", "user_id" => "1"),
            array("name" => "Ruaraka", "county_id" => "30", "user_id" => "1"),
            array("name" => "Kasarani", "county_id" => "30", "user_id" => "1"),
            array("name" => "Langata", "county_id" => "30", "user_id" => "1"),
            array("name" => "Kamukunji", "county_id" => "30", "user_id" => "1"),
            array("name" => "Makandara", "county_id" => "30", "user_id" => "1"),
            array("name" => "Dagoretti", "county_id" => "30", "user_id" => "1"),
            array("name" => "Bomet East", "county_id" => "2", "user_id" => "1"),
            array("name" => "Bomet Central", "county_id" => "2", "user_id" => "1"),
            array("name" => "Sotik", "county_id" => "2", "user_id" => "1"),
            array("name" => "Chepalungu", "county_id" => "2", "user_id" => "1"),
            array("name" => "Konoin", "county_id" => "2", "user_id" => "1"),
            array("name" => "Alego Usonga", "county_id" => "38", "user_id" => "1"),
            array("name" => "Bondo", "county_id" => "38", "user_id" => "1"),
            array("name" => "Rarieda", "county_id" => "38", "user_id" => "1"),
            array("name" => "Ugenya", "county_id" => "38", "user_id" => "1"),
            array("name" => "Ugunja", "county_id" => "38", "user_id" => "1"),
            array("name" => "Gem", "county_id" => "38", "user_id" => "1")
        );
        foreach ($subCounties as $subCounty) {
            SubCounty::create($subCounty);
        }
        $this->command->info('subcounties table seeded');
       
      
    }
}