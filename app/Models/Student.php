<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='Students';
    protected $primaryKey = 'id';
    protected $fillable =[
      'name',
      'email',
      'password',
      'division',
      'upzilla',
      'address',
      'gender',
      'dob',
    ];
    public function setNameAttribute($value){
       $this->attributes['name']= ucwords($value);
    }

    public function setDobAttribute($value){
      return date("d-M-Y", strtotime($value));
    }
}
