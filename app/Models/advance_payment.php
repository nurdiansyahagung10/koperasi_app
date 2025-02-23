<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advance_payment extends Model
{
    protected $table = "advance_payments";

    protected $fillable = [
        "balance",
        "pdl_id",
        "user_id"
    ];

    public function pdl(){
        return $this->belongsTo(Pdl::class, "pdl_id");
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

}
