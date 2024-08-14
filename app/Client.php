<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = "Client";
    protected $fillable =[
        'name','firstname','lastname','cellphone','email','name_contact','phone_contact','status','levels','parking','rooms','full_rest','half_rest',
        'min_price','max_price'];
    protected $dates = ["deleted_at"];
}
