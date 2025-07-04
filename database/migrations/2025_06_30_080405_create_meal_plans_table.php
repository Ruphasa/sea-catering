<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateMealPlansTable extends Migration
  {
      public function up()
      {
          Schema::create('meal_plans', function (Blueprint $table) {
              $table->id();
              $table->string('name');
              $table->decimal('price', 10, 2);
              $table->text('description');
              $table->timestamps();
          });
      }

      public function down()
      {
          Schema::dropIfExists('meal_plans');
      }
  }
