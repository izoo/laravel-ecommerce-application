<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $fillable = ['supplier_name','site_name','ref_no','date_added'];
}
