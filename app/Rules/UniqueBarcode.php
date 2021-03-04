<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Item;

class UniqueBarcode implements Rule
{
    
    private $ignoreId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($ignoreId=null)
    {
       
        $this->ignoreId=$ignoreId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       //d ($value);
       $barcode=Item::findByBarcode($value,$this->ignoreId);
//dd ($barcode);

        if($barcode)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Barcode must be unique!';
    }
}
