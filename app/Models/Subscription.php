<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class Subscription extends Model
  {
      protected $fillable = ['user_id', 'meal_plan_id', 'meal_types', 'delivery_days', 'allergies', 'total_price', 'status'];
  }
