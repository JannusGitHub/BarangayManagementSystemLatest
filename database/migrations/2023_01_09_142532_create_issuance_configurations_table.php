<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuanceConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuance_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('name')->nullable()->comment = '1-Brgy Clearance, 2-Indigency, 3-Residency, 4-Registration, 5-License & Permit, 6-Cedula';
            $table->string('amount')->nullable();
            $table->string('cedula_taxable_amount')->nullable();
            $table->string('cedula_community_due')->nullable();
            $table->string('processing_time')->nullable();
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
        Schema::dropIfExists('issuance_configurations');
    }
}
