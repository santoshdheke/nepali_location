<?php

namespace Ssgroup\Address\Model;

use Ssgroup\Address\Model\Institute;
use Ssgroup\Address\Model\State;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['title', 'slug'];

    public function setTitleAttribute($value)
    {
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = str_slug($value);
    } 

    public function states()
    {
    	return $this->hasMany(State::class);
    } 

    public function institutes()
    {
        return $this->hasMany(Institute::class);
    } 
}
