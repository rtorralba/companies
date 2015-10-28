<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreements extends Model
{
    protected $table = 'agreements';
    protected $fillable = ['name', 'description'];

    public function companies()
    {
        return $this->belongsToMany('App\Company', 'companies_agreements', 'agreement_id', 'company_id');
    }

    public function providers()
    {
        return $this->belongsToMany('App\Company', 'companies_providers', 'company_id', 'provider_id');
    }
}
