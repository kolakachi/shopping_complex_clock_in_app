<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1; $i<101; $i++)
    	{
          DB::table('stores')->insert([
        	'number'=>$i,
        	'status'=>'closed',
        	'prev_activity'=>date('h:i:s'),
        	'new_activity'=>date('h:i:s'),



        	]);
        }
    }
}
