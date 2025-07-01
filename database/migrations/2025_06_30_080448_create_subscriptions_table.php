<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateSubscriptionsTable extends Migration
  {
      public function up()
      {
          Schema::create('subscriptions', function (Blueprint $table) {
              $table->id();
              $table->string('user_id');
              $table->string('phone');
              $table->string('meal_plan_id');
              $table->string('meal_types');
              $table->string('delivery_days');
              $table->text('allergies')->nullable();
              $table->decimal('total_price', 10, 2);
              $table->string('status')->default('Active');
              $table->date('created_at')->useCurrent();
              $table->date('updated_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('meal_plan_id')->references('id')->on('meal_plans');
          });
      }

      public function down()
      {
          Schema::dropIfExists('subscriptions');
      }
  }
