<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call([fillCitiesTableSeeder::class, fillStreetsTableSeeder::class, fillToursTableSeeder::class]);
	//$this->call([fillToursTableSeeder::class]);
	//чтобы выполнить один сидер без вызова корневого указать в команде
	// php artisan db:seed --class=название класса сидера
	echo "RRRRRRRRRR";exit; $this->call([fillUserTableSeeder::class]); 
    }
}
