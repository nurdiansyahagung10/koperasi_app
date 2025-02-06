<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pdl;

class Resort extends Model
{
    protected $table = "resorts";

    protected $fillable = [
        "resort_number",
        "pdl_id",
        "branch_id",
    ];

    public function pdl(){
        $this->belongsTo(pdl::class);
    }
}
