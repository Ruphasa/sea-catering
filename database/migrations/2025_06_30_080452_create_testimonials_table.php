<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateTestimonialsTable extends Migration
  {
      public function up()
      {
          Schema::create('testimonials', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger('user_id');
              $table->unsignedBigInteger('meal_plan_id');
              $table->text('review');
              $table->integer('rating');
              $table->timestamps();
              
              $table->foreign('user_id')->references('id')->on('users');
              $table->foreign('meal_plan_id')->references('id')->on('meal_plans');
          });
      }

      public function down()
      {
          Schema::dropIfExists('testimonials');
      }
  }
