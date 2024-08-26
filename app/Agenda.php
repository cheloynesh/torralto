<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;

    protected $table = "Agenda";
    protected $fillable =['fk_client','fk_user','fk_propertie','fk_status','appointment_date'];
    protected $dates = ["deleted_at"];
}
