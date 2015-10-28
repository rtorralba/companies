<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['cif', 'name'];

    public function clients()
    {
        return $this->belongsToMany('App\Company', 'companies_clients', 'company_id', 'client_id');
    }

    public function providers()
    {
        return $this->belongsToMany('App\Company', 'companies_providers', 'company_id', 'provider_id');
    }
}
