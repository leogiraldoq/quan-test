<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalUserData extends Model
{
    use HasFactory;
    

    protected $table = 'personal_users_data';

    protected $fillable = [
        'user_id',
        'personal_reference',
        'blood_type',
        'phone_number',
        'address',
        'birth'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

}
