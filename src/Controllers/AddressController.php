<?php

    namespace Ssgroup\Address\Controllers;

use Address\Model\Municipality;
use Address\Model\Province;
use Address\Model\State;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    public function province()
    {
        $provinces = Province::get();
        return view('address::province',compact('provinces'));
    }

    public function state($id)
    {
        $states = State::where('province_id',$id)->get();
        return view('address::district',compact('states'));
    }

    public function municipality($id)
    {
        $municipalities = Municipality::where('state_id',$id)->get();
        return view('address::municipality',compact('municipalities'));
    }

}
