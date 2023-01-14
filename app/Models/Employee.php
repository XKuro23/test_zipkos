<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employee";
    protected $fillable=['fullname','department','email','phone','company_id'];

    public function companies(){
        return $this->belongsTo(Companies::class,'company_id','id');
    }
}
