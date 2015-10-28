<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['cif', 'name'];

    public function clients()
    {
        return $this->belongsToMany('App\Company', 'companies_relations', 'provider_id', 'client_id');
    }

    public function providers()
    {
        return $this->belongsToMany('App\Company', 'companies_relations', 'client_id', 'provider_id');
    }

    public function agreements()
    {
        return $this->belongsToMany('App\Agreement', 'companies_agreements', 'company_id', 'agreement_id');
    }
}
