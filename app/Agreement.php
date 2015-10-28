<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreements';
    protected $fillable = ['name', 'description', 'company_id'];

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company', 'companies_agreements', 'agreement_id', 'company_id');
    }
}
