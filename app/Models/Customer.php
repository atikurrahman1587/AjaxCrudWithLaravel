<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public static function formValidation($request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:customers',
            'addressOne'    => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'zip'           => 'required',
        ]);
    }
    public static function formValidationForUpdate($request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'addressOne'    => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'zip'           => 'required',
        ]);
    }
    public static function saveBasicInfo($customer, $request) {
        $customer->name            = $request->name;
        $customer->email           = $request->email;
        $customer->address_one     = $request->addressOne;
        $customer->address_two     = $request->addressTwo;
        $customer->city            = $request->city;
        $customer->state           = $request->state;
        $customer->zip             = $request->zip;
        $customer->save();
    }

    public static function newCustomer($request) {
        self::formValidation($request);
        self::saveBasicInfo(new Customer(), $request);
        return 'Customer Create Successfully';
    }

    public static function updateCustomer($request)
    {
        self::formValidationForUpdate($request);
        self::saveBasicInfo(Customer::find($request->id), $request);
        return 'Customer Update Successfully';
    }
}
