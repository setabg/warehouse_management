<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueWarehouse;
use App\Rules\UniqueBarcode;

class StoreItemRequest extends FormRequest
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
        $uniqueBarcodeRule=new UniqueBarcode();
        return [
            'warehouse_id' =>'required',
            'name' => 'required',
            'barcode' => ['required', $uniqueBarcodeRule]          
        ];
    }
    public function messages()
    {
        return[
            'warehouse_id.required'=>'Warehouse is required!',
            'name.required'=>'Name is required!',
            'barcode.required'=>'Barcode is required!',
            'barcode.unique'=>'Barcode must be unique!',

        ];
    }
}
