<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propertie extends Model
{
    use SoftDeletes;

    protected $table = "Properties";
    protected $fillable =[
        'levels','parking','rooms','full_rest','half_rest','min_price','max_price','street','e_num','i_num','suburb','pc',
        'country','state','city'];
    protected $dates = ["deleted_at"];
}
