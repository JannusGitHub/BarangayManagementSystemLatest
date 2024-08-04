<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_others', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('classification')->nullable();
            $table->string('zoning_classification')->nullable();
            $table->string('fiesta')->nullable();
            $table->string('distance_to_poblacion')->nullable();
            $table->string('travel_time_to_poblacion')->nullable();
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';

           // Defaults
            $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangay_others');
    }
}
