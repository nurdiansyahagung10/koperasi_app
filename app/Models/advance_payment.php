<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advance_payment extends Model
{
    protected $table = "advance_payments";

    protected $fillable = [
        "balance",
        "detail_resort_id",
        "user_id",
        "pdl_id",
        "proof_advance_payment"
    ];

    public function pdl(){
        return $this->belongsTo(Pdl::class, "pdl_id");
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function detail_resort(){
        return $this->belongsTo(DetailResort::class,"detail_resort_id");
    }

}
