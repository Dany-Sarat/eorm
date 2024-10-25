<?php
namespace App\Http\Controllers;
use App\Common\AtributosNotaDetalle;
use App\Models\Alumno;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SeccionCursoController extends Controller
{
    public function index(Seccion $seccion, mixed $id)
    {
        return view('pages.mis-secciones.cursos.index', compact('seccion', 'id'));
    }
    public function ver(Seccion $seccion, mixed $id, Alumno $alumno)
    {
        $notas = $alumno->notas()->with('detalles')->where('seccion_id', $alumno->seccion_id)->first();
        return view('pages.mis-secciones.cursos.ver', compact('seccion', 'id', 'alumno', 'notas'));
    }
    public function actualizarNotas(Alumno $alumno, mixed $id, Request $request)
    {
        try {
            $nota = $alumno->notas()->where('seccion_id', $alumno->seccion->id)->first();
            [$tareas, $examen, $total] = AtributosNotaDetalle::getAtributos(unidad: $id);
            foreach ($nota->detalles as $detalle) {
                $detalle->$tareas = $request->input("curso_tareas_{$detalle->curso_id}");
                $detalle->$examen = $request->input("curso_examen_{$detalle->curso_id}");
                $detalle->$total = round(($detalle->$tareas + $detalle->$examen), 2);
                $detalle->promedio_total = round(
                    ($detalle->total_primera_unidad + $detalle->total_segunda_unidad + $detalle->total_tercera_unidad + $detalle->total_cuarta_unidad) / $id,
                    2
                );
                $detalle->save();
            }
            $promedioTotal = $nota->detalles()->sum('promedio_total') / $nota->detalles()->count('curso');
            $nota->promedio = $promedioTotal;
            $nota->save();
            DB::commit();
            return back()
                ->with(['actualizacion_exitosa' => "Se realizó el registro correctemente"]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return back()
                ->withErrors(['actualizacion_fallida' => 'El registró no puedo realizarse']);
        }
    }
}