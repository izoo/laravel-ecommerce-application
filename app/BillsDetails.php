<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillsDetails extends Model
{
    //
    protected $fillable = ['item','price','quantity','description','ref_no','total_cost','balance','amount_paid','vat'];
}
