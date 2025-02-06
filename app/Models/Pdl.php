<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;

class Pdl extends Model
{
    public function resort(){
        $this->hasOne(Resort::class);
    }
}
