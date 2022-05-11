<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    
    //redirects back to correct tab
    protected $redirect = '/dashboard#tab4';

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
           'photo' =>  'mimes:png,jpg,jpeg,bmp |max:10240',
        ];
    }

    public function messages()
    {
        return [
           'photo.mimes' => 'Выбранный файл должен являться картинкой png, jpg, jpeg или bmp.',
           'photo.max' => 'Выбранный файл превышает 10Мб.',
        ];
    }
}
