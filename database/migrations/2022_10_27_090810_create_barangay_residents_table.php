<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barangay_id_number')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('gender')->nullable();
            $table->tinyInteger('civil_status')->nullable()->comment = '1-Single, 2-Married, 3-Widow/er, 4-Annulled, 5-Legally Separated, 6-Others';
            $table->string('length_of_stay')->nullable();
            $table->date('birthdate');
            $table->string('birth_place')->nullable();
            $table->string('purok')->nullable();
            $table->string('block')->nullable();
            $table->string('lot')->nullable();
            $table->string('street')->nullable();
            $table->string('phase')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('phil_health_number')->nullable();
            $table->tinyInteger('educational_attainment')->nullable()->comment = '1-Elementary Graduate, 2-Elementary Undergraduate, 3-High School Graduate, 4-High School Undergraduate, 5-College Graduate, 6-College Undergraduate, 7-Masters Graduate, 8-Some/Completed Masters Degree, 9-Vocational, 10-Others';
            $table->string('photo')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';
            $table->unsignedBigInteger('user_id')->comment = 'Reference on users table';


           // Defaults
            $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangay_residents');
    }
}
