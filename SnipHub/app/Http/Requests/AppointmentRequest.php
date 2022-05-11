<?php

namespace App\Http\Requests;

use Illuminate\Supports\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    
    //redirects back to correct tab
    protected $redirect = '/dashboard#tab1';

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
           'email' => 'unique:appointment_models',
        ];
    }

    public function messages()
    {
        return [
           'email.unique' => 'У вас уже назначена консультация.',
        ];
    }
}
