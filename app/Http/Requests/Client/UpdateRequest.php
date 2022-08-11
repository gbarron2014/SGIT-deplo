<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:50',

            //'rfc_number'=>'nullable|string|min:12|unique:clients,rfc_number,'. $this->route('client')->id.'|max:12',

            'address'=>'nullable|string|max:120',

            'phone'=>'nullable|string|min:10|max:10|unique:clients,phone,'. $this->route('client')->id.'|max:10',
            'email'=>'nullable|string|email:rfc,dns|unique:clients,email,'. $this->route('client')->id.'|max:50',
        ];
    }
    public function messages()
    {
        return[
            
            'name.required'=>'¡Estel nombre es requerido!',
            'name.max'=>'¡El nombre tiene un máximo de 50 caracteres!',

            //'rfc_number.required'=>'¡El RFC es requerido!',
            //'rfc_number.string'=>'¡Los datos del RFC no son correctos! Ingresa valores validos',
            //'rfc_number.max'=>'¡El RFC tiene un máximo de 12 caracteres!',
            //'rfc_number.min'=>'¡El RFC tiene un mínimo de 12 caracteres!',
            //'rfc_number.unique'=>'¡Este RFC ya se encuentra registrado!',

            'address.max'=>'¡La dirección tiene un máximo de 120 caracteres!',
            'address.string'=>'¡Los datos de la dirección no son correctos! Ingresa valores validos',

            'phone.string'=>'¡Este valor no es un correcto!',
            'phone.max'=>'¡El número de contacto tiene un máximo de 10 caracteres!',
            'phone.min'=>'¡El número de contacto tiene un mínimo de 10 caracteres!',
            'phone.unique'=>'¡Este número de contacto ya se encuentra registrado!',

            'email.email'=>'¡Este no es un correo electrónico!',
            'email.string'=>'¡Los datos del correo electrónico no son correctos! Ingresa valores validos',
            'email.max'=>'¡El correo electrónico tiene un máximo de 50 caracteres!',
            'email.unique'=>'¡Este correo electrónico ya se encuentra registrado!',
        ];   
    }    
}
