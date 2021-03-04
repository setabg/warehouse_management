<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueWarehouse;

class StoreWarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uniqueWarehouseRule=new UniqueWarehouse($this->all());
        return [
            'name' =>['required','unique:warehouses'],
            'country' => ['required', $uniqueWarehouseRule],
            'city' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
        ];

    }

    public function messages()
    {
        return[
            'name.required'=>'Name is required!',
            'name.unique'=>'Name must be unique!',
            'country.required'=>'Country is required!',
            'city.required'=>'City is required!',
            'address.required'=>'Address is required!',
            'contact_person.required'=>'Contact person is required!',
            'phone.required'=>'Phone is required!',

        ];
    }
}
