<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'phone', 'meal_plan_id', 'meal_types', 'delivery_days', 'allergies', 'total_price', 'status'];

    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
