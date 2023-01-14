<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $table="companies";
    protected $fillable=['company_name','company_email','company_address','company_phone'];

    public function employees(){
        return $this->hasMany(Employee::class,'company_id','id');
    }
}
