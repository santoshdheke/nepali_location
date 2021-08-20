<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'address-package'
],function (){
    Route::get('province','Address\Controllers\AddressController@province');
    Route::get('state/{province}','Address\Controllers\AddressController@state');
    Route::get('municipality/{state}','Address\Controllers\AddressController@municipality');
});