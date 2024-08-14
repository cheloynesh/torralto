<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostalCode extends Model
{
    use SoftDeletes;

    protected $table = "PostalCode";
    protected $fillable =[
        'suburb','pc','country','state','city'];
    protected $dates = ["deleted_at"];
}
