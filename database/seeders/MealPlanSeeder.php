<?php

  namespace Database\Seeders;

  use Illuminate\Database\Seeder;
  use App\Models\MealPlan;

  class MealPlanSeeder extends Seeder
  {
      public function run()
      {
          MealPlan::create(['name' => 'Diet Plan', 'price' => 30000, 'description' => 'Rencana makan sehat untuk diet.']);
          MealPlan::create(['name' => 'Protein Plan', 'price' => 40000, 'description' => 'Rencana tinggi protein untuk fitness.']);
          MealPlan::create(['name' => 'Balanced Plan', 'price' => 60000, 'description' => 'Rencana seimbang untuk keluarga.']);
      }
  }
