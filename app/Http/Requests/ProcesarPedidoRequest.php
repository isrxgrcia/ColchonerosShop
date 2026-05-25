<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ProcesarPedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'direccion_envio' => 'required|string|max:500',
            'metodo_pago'     => 'required|in:TARJETA,BIZUM,PAYPAL'
        ];
    }
    public function messages(): array
    {
        return [
            'direccion_envio.required' => 'La dirección de envío es completamente obligatoria.',
            'metodo_pago.required'     => 'Debes seleccionar un método de pago seguro.',
            'metodo_pago.in'           => 'El método de pago seleccionado no es soportado por el momento.'
        ];
    }
}