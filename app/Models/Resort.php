<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pdl;
use App\Models\DetailResort;
use App\Models\BranchOffice;

class Resort extends Model
{
    protected $table = "resorts";

    protected $fillable = [
        "resort_number",
        "pdl_id",
        "branch_id",
    ];

    public function pdl(){
       return $this->belongsTo(pdl::class);
    }

    public function detail_resorts(){
        return $this->hasMany(DetailResort::class, "resort_id");
    }

    public function branch_offices(){
        return $this->belongsTo(BranchOffice::class, "branch_id");
    }
}
