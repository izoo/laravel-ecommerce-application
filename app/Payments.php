<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //
    protected $fillable=['supplier_name','amount_due','amount_paid','balance','mode_payment','mpesa_code','ref_no','date_add'];
}
