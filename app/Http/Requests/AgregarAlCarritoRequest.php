<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class AgregarAlCarritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'producto_id' => 'required|exists:products,id',
            'talla'       => 'required|string',
            'cantidad'    => 'required|integer|min:1'
        ];
    }
    public function messages(): array
    {
        return [
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.exists'   => 'El producto seleccionado ya no existe en la tienda.',
            'talla.required'       => 'Debes seleccionar una talla obligatoriamente.',
            'cantidad.min'         => 'La cantidad mínima a añadir es 1.',
        ];
    }
}