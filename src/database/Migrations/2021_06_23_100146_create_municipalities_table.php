<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });

        $provinceInstance =new \Sagautam5\LocalStateNepal\Entities\Province('en');
        $provinces = $provinceInstance->getProvincesWithDistrictsWithMunicipalities();

        $provincesDb = [];
        $statesDb = [];
        $municipalitiesDb = [];

        foreach ($provinces as $key => $province) {

            $provinceDb[] = [
                'title' => $title = $province->name,
                'slug' => \Illuminate\Support\Str::slug($title),
            ];

            foreach ($province->districts as $key => $state) {
                $statesDb[] = [
                    'province_id' => $state->province_id,
                    'title' => $stateTitle = $state->name,
                    'slug' => \Illuminate\Support\Str::slug($stateTitle),
                ];

                foreach ($state->municipalities as $key => $municipality) {
                    $municipalitiesDb[] = [
                        'state_id' => $municipality->district_id,
                        'title' => $municipalityTitle = $municipality->name,
                        'slug' => \Illuminate\Support\Str::slug($municipalityTitle),
                    ];
                }
            }
        }

        DB::table('provinces')->insert($provinceDb);
        DB::table('states')->insert($statesDb);
        DB::table('municipalities')->insert($municipalitiesDb);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
