<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('job_id');
            $table->string('entreprise_name');
            $table->longText('description');
            $table->string('photo');
            $table->string('date_naissance');
            $table->string('sexe');
            $table->string('numero');
            $table->string('numero_piece_identite');
            $table->string('photo_piece_identite');
            $table->string('pays');
            $table->string('ville');
            $table->string('commune');
            $table->string('rue');
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
        Schema::dropIfExists('completed_profiles');
    }
}
