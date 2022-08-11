<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|unique:categories|string|max:30',
            'description'=>'nullable|string|max:120'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'¡Se requiere un nombre de categoría!',
            'name.string'=>'¡Los datos del nombre de categoría no son correctos! Ingresa valores validos',
            'name.max'=>'¡El nombre de la categoría es de 30 caracteres máximo!',
            'name.unique'=>'¡Esta categoría ya se encuentra registrada!',
            
            'description.string'=>'¡La descripción no es correctos! Ingresa valores validos',
            'description.max'=>'¡La descripción es de 120 caracteres máximo!',
        ];
    }
}
