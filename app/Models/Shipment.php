<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_code',
        'origin',
        'destination',
        'expected_delivery_date',
        'is_delivered',
        'customer_name',
        'customer_email',
        'customer_phone',
    ];

    protected $casts = [
        'expected_delivery_date' => 'date'
    ];

    /*
     * Through this relation we get the carrier for the shipment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statuses(): BelongsToMany
    {
        return $this->belongsToMany(Status::class);
    }
}
