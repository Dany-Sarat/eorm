<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\AsistenciaDetalle;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MisSeccionesController extends Controller
{
    public function index()
    {
        $secciones = Seccion::where('docente_id', Auth::user()->id)
            ->whereHas('grado', function($query){
                return $query->where('anio_asignacion', now()->format('Y'));
            })
            ->get();

        return view('pages.mis-secciones.index', compact('secciones'));
    }

    public function ver(Seccion $seccion)
    {
        if ($seccion->docente_id != Auth::user()->id) {
            abort(404);
        }


        return view('pages.mis-secciones.ver', compact('seccion'));
    }

    public function unidad(Seccion $seccion, mixed $id)
    {
        $cursos = $seccion->grado->cursos;
        $asistencias = $seccion->asistencias()->where('unidad', $id)->paginate(10);

        return view('pages.mis-secciones.unidad', compact('cursos', 'seccion', 'id', 'asistencias'));
    }

    public function registrarAsistencia(Seccion $seccion, Request $request)
    {
        try {
            $asistencia = new Asistencia();
            $asistencia->fecha_toma_asistencia = $request->input('fecha_asistencia');
            $asistencia->unidad = $request->input('unidad');
            $asistencia->seccion_id = $seccion->id;
            $asistencia->save();

            foreach ($seccion->alumnos as $alumno) {
                $detalle = new AsistenciaDetalle();
                $detalle->estado = ($request->has("asistencia_estado_{$alumno->id}") ? true : false);
                $detalle->alumno_id = $alumno->id;
                $detalle->asistencia_id = $asistencia->id;
                $detalle->save();
            }

            DB::commit();
            return back()
                ->with(['creacion_exitosa' => 'Se registró correctamente']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return back()
                ->withErrors(['creacion_fallida' => 'No se pudo realizar el registro']);
        }
    }

    public function detalleAsistencia(Seccion $seccion, mixed $id)
    {
        $asistencia = Asistencia::where('seccion_id', $seccion->id)
            ->where('id', $id)->first();

        // dd($asistencia);
        return view('pages.mis-secciones.detalle-asistencia', compact('asistencia'));
    }
}
