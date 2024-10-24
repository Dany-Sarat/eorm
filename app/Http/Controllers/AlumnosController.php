<?php
namespace App\Http\Controllers;
use App\Http\Requests\ActualizarAlumnoRequest;
use App\Http\Requests\CrearAlumnoRequest;
use App\Models\Alumno;
use App\Models\Seccion;

class AlumnosController extends Controller
{
    private const ALUMNOS_PER_PAGE = 2;

    public function index()
    {
        $alumnos = Alumno::paginate(self::ALUMNOS_PER_PAGE);
        return view('pages.alumnos.index', compact('alumnos'));
    }
    public function crear()
    {
        $secciones = Seccion::all();
        return view('pages.alumnos.crear', compact('secciones'));
    }

    public function guardar(CrearAlumnoRequest $request)
    {
        $alumno = new Alumno();
        $alumno->nombre = $request->input('nombre');
        $alumno->apellido = $request->input('apellido');
        $alumno->codigo = $request->input('codigo');
        $alumno->telefono = $request->input('telefono');
        $alumno->correo = $request->input('correo');
        $alumno->nombre_encargado = $request->input('nombre_encargado');
        $alumno->apellido_encargado = $request->input('apellido_encargado');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');

        $seccion = Seccion::where('id', $request->input('seccion'))->first();
        $alumno->seccion_id = $seccion->id;
        $alumno->grado_id = $seccion->grado->id;

        $result = $alumno->save();
        if ($result == true) {
            return redirect(route('alumnos.editar', $alumno->id))
                ->with(['creacion_exitosa' => 'Se creó exitosamente']);
        }
        return back()
            ->withErrors(['creacion_fallida' => 'Se produjo un error al intentar crear el alumno']);
    }
    public function editar(mixed $id)
    {
        $alumno = Alumno::where('id', $id)->first();
        if ($alumno == null) {
            abort(404);
        }
        $secciones = Seccion::all();
        return view('pages.alumnos.ver', compact('alumno', 'secciones'));
    }

    public function actualizar(mixed $id, ActualizarAlumnoRequest $request)
    {
        $alumno = Alumno::where('id', $id)->first();
        if ($alumno == null) {
            abort(404);
        }
        $result = $alumno->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            'nombre_encargado' => $request->input('nombre_encargado'),
            'apellido_encargado' => $request->input('apellido_encargado'),
        ]);
        if ($result == true) {
            return back()
                ->with(['actualizacion_exitosa' => 'Se actualizó correctamente']);
        }
        return back()
            ->withErrors(['actualizacion_fallida' => 'Se produjo un error al actualizar']);
    }
}