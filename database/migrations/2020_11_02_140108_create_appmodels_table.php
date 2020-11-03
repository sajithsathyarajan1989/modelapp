<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number');
            $table->double('size',8,2)->nullable();
            $table->string('photo');
            $table->date('publish_date');
            $table->text('description');
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
        Schema::dropIfExists('appmodels');
    }
}
