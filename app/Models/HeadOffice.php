<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadOffice extends Model
{
    protected $table = "head_offices";

    protected $fillable = [
        "province",
        "city_or_regency",
        "district",
        "village",
        "rt_and_rw",
        "phone_number",
        "street_or_building_name"
    ];

}
