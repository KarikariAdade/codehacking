<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



//THIS REQUEST CLASS CAN BE REPLACED WITH THE REQUEST CLASS IN THE CONTROLLER

class UsersRequest extends FormRequest
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
        return [
            'name' => ['required', 'min: 3'],
            'email' => ['required'],
            'password' => ['required']
            

        ];
    }
}
