<?php

namespace Ssgroup\Address\Model;

use Ssgroup\Address\Model\Institute;
use Ssgroup\Address\Model\State;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = ['name','slug','state_id'];


    public function state()
    {
    	return $this->belongsTo(State::class);
    } 

     public function institutes()
    {
        return $this->hasMany(Institute::class);
    } 
}
