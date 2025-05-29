<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'full_name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'phone_number',
        'address',
        'city',
        'province',
        'postal_code',
        'national_id_number',
        'marital_status',
        'occupation',
        'education',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
