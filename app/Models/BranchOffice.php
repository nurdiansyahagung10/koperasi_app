<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HeadOffice;

class BranchOffice extends Model
{
    protected $table = "branch_offices";

    protected $fillable = [
        'branch_name',
        'city_or_regency',
        'district',
        'village',
        'rt_and_rw',
        'street_or_building_name',
        'phone_number',
        'maxresort',
        'service_charge',
        'admin_charge',
        'comision_charge',
        'deposite',
        'head_id'
    ];

    public function head_offices()
    {
        return $this->belongsTo(HeadOffice::class, "head_id");
    }
}
