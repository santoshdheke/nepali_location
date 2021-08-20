<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'address-package'
],function (){
    Route::get('province','Ssgroup\Address\Controllers\AddressController@province');
    Route::get('state/{province}','Ssgroup\Address\Controllers\AddressController@state');
    Route::get('municipality/{state}','Ssgroup\Address\Controllers\AddressController@municipality');
});