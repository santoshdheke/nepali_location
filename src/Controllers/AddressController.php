<?php

namespace Ssgroup\Address\Controllers;

use Ssgroup\Address\Model\Municipality;
use Ssgroup\Address\Model\Province;
use Ssgroup\Address\Model\State;
use Ssgroup\ApiManager\Controllers\ApiBaseController;

class AddressController extends ApiBaseController
{

    public function province()
    {
        $provinces = Province::get();
        return $this->sendDataResponse($provinces);
        return view('address::province',compact('provinces'));
    }

    public function state($id)
    {
        $states = State::where('province_id',$id)->get();
        return $this->sendDataResponse($states);
        return view('address::district',compact('states'));
    }

    public function municipality($id)
    {
        $municipalities = Municipality::where('state_id',$id)->get();
        return $this->sendDataResponse($municipalities);
        return view('address::municipality',compact('municipalities'));
    }

}
