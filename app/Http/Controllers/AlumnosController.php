<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarAlumnoRequest;
use App\Http\Requests\CrearAlumnoRequest;
use App\Models\Alumno;
use App\Models\Nota;
use App\Models\NotaDetalle;
use App\Models\Seccion;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    private const ALUMNOS_PER_PAGE = 10;

    public function index()
    {
        $alumnos = Alumno::paginate(self::ALUMNOS_PER_PAGE);

        return view('pages.alumnos.index', compact('alumnos'));
    }

    public function crear()
    {
        $secciones = Seccion::whereHas('grado', function ($query) {
            return $query->where('anio_asignacion', now()->format('Y'));
        })->get();

        return view('pages.alumnos.crear', compact('secciones'));
    }

    public function guardar(CrearAlumnoRequest $request)
    {
        DB::beginTransaction();
        try {
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
            $alumno->grado_actual = "{$seccion->grado->nombre} {$seccion->nombre}";

            $alumno->save();

            $nota = new Nota();
            $nota->promedio = 0.00;
            $nota->alumno_id = $alumno->id;
            $nota->seccion_id = $seccion->id;
            $nota->save();

            foreach ($seccion->grado->cursos as $curso) {
                $detalle = new NotaDetalle();
                $detalle->curso_id = $curso->id;
                $detalle->nota_id = $nota->id;
                $detalle->save();
            }

            DB::commit();
            return redirect(route('alumnos.editar', $alumno->id))
                ->with(['creacion_exitosa' => 'Se creó exitosamente']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return back()
                ->withErrors(['creacion_fallida' => 'Se produjo un error al intentar crear el alumno']);
        }
    }

    public function editar(mixed $id)
    {
        $alumno = Alumno::where('id', $id)->first();

        if ($alumno == null) {
            abort(404);
        }

        $secciones = Seccion::whereHas('grado', function ($query) {
            return $query->where('anio_asignacion', now()->format('Y'));
        })->get();

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

        // $nota = $alumno->notas()->where('seccion_id', $alumno->seccion->id);
        
        // $seccion = Seccion::where('id', $request->input('seccion'))->first();
        // $alumno->seccion_id = $seccion->id;
        // $alumno->grado_id = $seccion->grado->id;
        // $alumno->seccion_actual = "{$seccion->grado->nombre} {$seccion->nombre}";
        // $alumno->save();

        // $nota->seccion_id = $seccion->id;
        // $nota->save();

        if ($result == true) {
            return back()
                ->with(['actualizacion_exitosa' => 'Se actualizó correctamente']);
        }

        return back()
            ->withErrors(['actualizacion_fallida' => 'Se produjo un error al actualizar']);
    }
}
