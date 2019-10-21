<?php

use App\Crud;
use Illuminate\Database\Seeder;

class CrudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                factory(Crud::class, 20)->create();
//        factory(Crud::class)->make();



    }
}
