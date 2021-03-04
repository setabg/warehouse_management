<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Warehouse;

class UniqueWarehouse implements Rule
{
    private $inputs;
    private $ignoreId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($inputs,$ignoreId=null)
    {
       
        $this->inputs=$inputs;
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
        $country=$this->inputs['country'];
        $city=$this->inputs['city'];
        $address=$this->inputs['address'];
        $warehouse=Warehouse::findByNameAndAddress($country,$city,$address,$this->ignoreId);

        if($warehouse)
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
        return 'Warehouse must be unique for that location';
    }
}
