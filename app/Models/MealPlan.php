<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class MealPlan extends Model
  {
      protected $fillable = ['name', 'price', 'description'];

        public function subscriptions()
        {
            return $this->hasMany(Subscription::class);
        }

        public function testimonials()
        {
            return $this->hasMany(Testimonial::class);
        }
  }
