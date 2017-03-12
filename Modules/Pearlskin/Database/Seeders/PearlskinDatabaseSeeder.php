<?php

namespace Modules\Pearlskin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class PearlskinDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        $this->call(ClientsTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
