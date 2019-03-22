<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['firstname', 'company', 'email', 'phone'];
    protected $table = 'employees';
    //
    public function companies()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
}
