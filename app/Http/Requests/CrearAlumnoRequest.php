<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class CrearAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|min:8',
            'correo' => 'nullable|string',
            'nombre_encargado' => 'required|string',
            'apellido_encargado' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'seccion' => 'required',
        ];
    }
}