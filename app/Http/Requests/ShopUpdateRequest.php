<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShopUpdateRequest extends FormRequest
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
            'url'   => ['required',Rule::unique('shops','url')->ignore($this->id)],
            'notes' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slug.unique'     => 'SLUG musí být unikátní. Tento záznam již v databázi existuje',
            'url.required'    => 'Toto pole musí být vyplněno',
            'url.unique'     =>  'URL musí být unikátní. Tento záznam již v databázi existuje',
            'notes.required' => 'Toto pole musí být vyplněno',
        ];
    }
}
