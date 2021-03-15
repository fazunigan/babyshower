<?php

namespace App\Http\Requests;
use Carbon\Carbon;

use Illuminate\Foundation\Http\FormRequest;

class BabyshowerCreateRequest extends FormRequest
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
        $max=Carbon::now()->addMonths(4)->format('Y-m-d');

        return [
            'name_papa' => 'required',
            'name_mama' => 'required',
            'name_bebe' => 'required',
            'email' => 'required',
            'birth_date' => 'required|after:yesterday|before:'.$max,
        ];
    }

    public function messages()
{
    return [
        'name_mama.required' => 'El nombre de la mamá es obligatorio.',
        'name_papa.required' => 'El nombre del papá es obligatorio.',
        'name_bebe.required' => 'El nombre del bebe es obligatorio.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'birth_date.required' => 'La fecha de nacimiento aproximada del bebe es obligatoria.',
        'birth_date.after' => 'La fecha de nacimiento aproximada del bebe es inválida',
        'birth_date.before' => 'La fecha de nacimiento aproximada del bebe debe ser antes de 4 meses',
    ];
}
}
