<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('activityId');
            $table->string('activityName')->nullable();
            $table->string('activityType')->nullable();
            $table->string('activityPlace')->nullable();
            $table->string('activityStartDate')->nullable();
            $table->string('activityEndDate')->nullable();
            $table->string('activityScore')->nullable();
            $table->string('activityStatus')->nullable();
            $table->string('activityStatusName')->nullable();
            $table->string('activityFile')->nullable();
            $table->string('activityAdvice')->nullable();
            $table->string('activityResponsible')->nullable();
            $table->string('activityTarget')->nullable();
            $table->string('activityBudget')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
