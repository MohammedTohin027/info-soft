<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_nos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('upazila_id');
            $table->bigInteger('union_id');
            $table->string('name_en');
            $table->string('name_bn');
            $table->tinyInteger('status')->default('0')->comment('0=active, 1=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ward_nos');
    }
}