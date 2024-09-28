<?php
namespace App\Http\Controllers\Auth;
use App\Common\Contrato;
use App\Common\Formacion;
use App\Common\Rol;
use App\Http\Controllers\Controller;
use App\Models\InfoDocente;
use App\Models\InfoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ManejoUsuariosController extends Controller
{
    private const USUARIOS_POR_PAGINA = 1;
    public function index()
    {
        $usuarios = User::paginate(self::USUARIOS_POR_PAGINA);
        return view('pages.users.index', compact('usuarios'));
    }
    public function crear()
    {
        return view('pages.users.crear');
    }
    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|string',
            'rol' => [
                'required',
                Rule::in(array_column(Rol::cases(), 'value')),
            ],
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'formacion_academica' => [
                'required',
                Rule::in(array_column(Formacion::cases(), 'value')),
            ],
            'inicio_laboral' => 'required|date',
            'tipo_contrato' => [
                'required',
                Rule::in(array_column(Contrato::cases(), 'value')),
            ]
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        DB::beginTransaction();
        try {
            $usuario = new User();
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol = $request->rol;
            $usuario->save();
            $infoUsuario = new InfoUsuario();
            $infoUsuario->nombres = $request->nombres;
            $infoUsuario->apellidos = $request->apellidos;
            $infoUsuario->fecha_nacimiento = $request->fecha_nacimiento;
            $infoUsuario->user_id = $usuario->id;
            $infoUsuario->save();
            $infoDocente = new InfoDocente();
            $infoDocente->formacion_academica = $request->formacion_academica;
            $infoDocente->inicio_laboral = $request->inicio_laboral;
            $infoDocente->tipo_contrato = $request->tipo_contrato;
            $infoDocente->user_id = $usuario->id;
            $infoDocente->save();
            Db::commit();
            return redirect(route('users.ver', $usuario->id))
            ->with([
                'creacion_exitosa' => 'Se creó usuario correctamente'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'creacion_fallida' => 'Se produjo un error en la creación de usuario',
            ]);
        }
    }
    public function ver(mixed $id)
    {
        $usuario = User::where('id', $id)->first();
        if ($usuario == null) {
            abort(404);
        }
        $edad = \Carbon\Carbon::createFromFormat('Y-m-d', '2020-01-01');
        return view('pages.users.ver', compact('usuario', 'edad'));
    }
    public function actualizar(mixed $id, Request $request)
    {
        $usuario = User::where('id', $id)->first();
        if ($usuario == null) {
            abort(404);
        }
  
        $validator = Validator::make($request->all(), [ 
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'formacion_academica' => [
                'required',
                Rule::in(array_column(Formacion::cases(), 'value')),
            ],
            'tipo_contrato' => [
                'required',
                Rule::in(array_column(Contrato::cases(), 'value')),
            ]
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        DB::beginTransaction();
        try {
            $infoUsuario = $usuario->infoUsuario;
            $infoUsuario->update([
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
            ]);
            $infoDocente = $usuario->infoDocente;
            $infoDocente->update([
                'formacion_academica' => $request->input('formacion_academica'),
                'tipo_contrato' => $request->input('tipo_contrato'),
            ]);
            DB::commit();
            return back()->with(['actualizacion_exitosa' => 'Se actualizó correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['actualizacion_fallida' => 'Se produjo un error al intentar actualizar']);
        }
    }
}