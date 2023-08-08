<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelUserRole extends Model
{
    use HasFactory;

    protected $table = "rel_user_rol";

    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    public function roles(): BelongsTo{
        return $this->belongsTo(Role::class,'role_id');
    }
}
