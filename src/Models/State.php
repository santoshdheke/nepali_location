<?php

namespace Ssgroup\Address\Model;

use Address\Model\Institute;
use Address\Model\Municipality;
use Address\Model\Province;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['title','slug','province_id'];

    public function province()
    {
    	return $this->belongsTo(Province::class);
    } 

    public function municipalities()
    {
    	return $this->hasMany(Municipality::class);
    		
    } 

     public function institutes()
    {
        return $this->hasMany(Institute::class);
    } 
}
