<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanAplication extends Model
{
    protected $table = "loan_aplications";

    protected $fillable = [
        'loan_application_date',
        'aprove_date',
        'status',
        'binding_letter',
        'binding_letter_image',
        'nominal_loan_application',
        'aprove_by',
        'member_id',
        'detail_resort_id',
        'pdl_id',
    ];
}
