<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dropping extends Model
{
    protected $table = "droppings";

    protected $fillable = [
        'member_tosign_spk_image',
        'member_and_spk_image',
        'spk_image',
        'proof_dropping',
        'loan_application_id',
        'status'
    ];

    public function loan_application () {
        return $this->belongsTo(LoanApplication::class);
    }
}
