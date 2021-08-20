<?php

namespace Ssgroup\Address\Model;

use Ssgroup\Address\Model\Institute;
use Ssgroup\Address\Model\Municipality;
use Ssgroup\Address\Model\Province;
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
