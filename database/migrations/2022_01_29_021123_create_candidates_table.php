<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('edition_id');
            $table->string('fullname');
            $table->string('nickname');
            $table->string('age');
            $table->string('tribe');
            $table->string('state_of_origin');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_phone_number')->nullable();
            $table->string('relationship')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('skills')->nullable();
            $table->string('languages')->nullable();
            $table->string('occupation')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('candidates');
    }
}
