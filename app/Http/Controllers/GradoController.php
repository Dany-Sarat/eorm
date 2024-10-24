<?php
namespace App\Http\Controllers;

use AppModels\Curso;
use App\Models\Grado;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GradoController extends Controller
{
    private const GRADOS_POR_PAGINA = 2;

    public function index() {


        $grados = Grado::whereYear('created_at', now()->format('Y'))->paginate(self::GRADOS_POR_PAGINA);
        return view('pages.grados.index', compact('grados'));
    }
    public function crear () {
        $docentes = User::with('infoUsuario')->get(['id', 'nombres', 'apellidos']);
        // ->pluck('id', 'nombres', 'apellidos');  
        $cursos = Curso::all();

        return view('pages.grados.crear', compact('docentes'));
    }
    public function guardar(Request $request) 
    {
        DB::beginTransaction();
        try {
            $grado = new Grado();
            $grado->nombre = $request->input('nombre');
            $grado->save();
            
            $index = 0;
            foreach($request->all() as $key => $value) {
                // si existe una coincidencia es que se va a agregar información de una sección
                if (strpos($key, 'seccion_') !== false) {
                    $index++;
                }
            }
            // se divide dentro de dos el resultado debido a que ese es el número de atributos que provienen de la sección
            // con esta operación se obtiene el número de secciones que se agregaran
            if ($index > 0) {
                $index /= 2;

            // se agregan las secciones correspondientes
            for($i = 0; $i < $index; $i++) {
                $seccion = new Seccion();
                $seccion->nombre = $request->input("seccion_nombre_{$i}");
                $seccion->docente_id = $request->input("seccion_docente_{$i}");
                $seccion->grado_id = $grado->id;
                $seccion->save();
            } 
            }

            $cursos = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'curso_') !== false) {
                    $cursos[] = $value;
                }
            }
            $grado->cursos()->attach($cursos);
            $grado->save();

            DB::commit();
            return redirect(route('grados.editar', $grado->id))
                ->with(['creacion_exitosa']);  
        } catch (QueryException $th) {
           DB::rollBack();
           dd($th->getMessage());
           return back()
            ->withErrors(['creacion_fallida' => 'Falló la creación de grado']); 

        }
    }
    public function editar(mixed $id) {
        $grado = Grado::where('id', $id)->first();
        if ($grado == null) {
            abort(404);
        }
        $docentes = User::with('infoUsuario')->get(['id', 'nombres', 'apellidos']);
        $cursos = Curso::all();

        return view('pages.grados.ver', compact('grado', 'docentes', 'cursos'));
    }
    public function actualizar(mixed $id, Request $request)
    {
        // dd($request->all());
        // dd($request->input('nombre'));
        $grado = Grado::where('id', $id)->first();
        if ($grado == null) {
            abort(404);
        }
        DB::beginTransaction();
        try {
            $grado->update([
                'nombre' => $request->input('nombre'),
            ]);
            $index = 0;
            foreach ($request->all() as $key => $value) {
                // si existe una coincidencia es que se va a agregar información de una sección
                if (strpos($key, 'seccion_') !== false) {
                    $index++;
                }
            }
            // se divide dentro de dos el resultado debido a que ese es el número de atributos que provienen de la sección
            // con esta operación se obtiene el número de secciones que se agregaran
            if ($index > 0) {
                $index /= 2;
                // se agregan las secciones correspondientes
                for ($i = 0; $i < $index; $i++) {
                    $seccion = Seccion::where('id', $request->input("seccion_id_{$i}"));
                    $seccion->update([
                        'nombre' => $request->input("seccion_nombre_{$i}"),
                        'docente_id' => $request->input("seccion_docente_{$i}"),
                    ]); 
                }
            }
            $cursos = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'curso_') !== false) {
                    $cursos[] = $value;
                }
            }
            $grado->cursos()->sync($cursos);
            $grado->save();
            DB::commit();
            return back()->with(['actualizacion_exitosa' => 'Se actualizó correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['actualizacion_fallida' => 'No se pudo actualizar']);
        }
    }
}