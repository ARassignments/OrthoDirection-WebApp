<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'monthly_price',
        'yearly_price',
        'features',
        'plan_type',
        'plan_popular',
        'status',
        'stripe_product_id',
        'stripe_price_id_monthly',
        'stripe_price_id_yearly'
    ];

    protected $casts = [
        'features' => 'array', // To handle JSON cast for features
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
