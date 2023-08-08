<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    
    protected $fillable = [
        'group',
        'rol',
        'description',
        'status'
    ];

    public function rel_user_rol(): HasMany{
        return $this->hasMany(RelUserRole::class,'role_id',);
    }
}
