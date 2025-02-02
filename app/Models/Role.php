<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable =[
        "permissions"
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
