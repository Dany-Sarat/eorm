<?php
namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::paginate(env('REGISTROS_POR_PAGINA', 10));
        return view('pages.cursos.index', compact('cursos'));
    }
    public function crear() {
        return view('pages.cursos.crear');
    }
    public function guardar(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $curso = new Curso();
        $curso->nombre = $request->input('nombre');
        $curso->save();
        return redirect(route('cursos.editar', $curso->id))
            ->with(['creacion_exitosa', 'Se creó curso exitosamente']);
    }
    public function editar(mixed $id) 
    {
        $curso = Curso::where('id', $id)->first();
        if ($curso == null) {
            abort(404);
        }
        return view('pages.cursos.ver', compact('curso'));
    }
    public function actualizar(mixed $id, Request $request) {
        $curso = Curso::where('id', $id)->first();
        if ($curso == null) {
            abort(404);
        }
        $curso->nombre = $request->input('nombre');  
        $curso->save();
        return back()->with(['actualizacion_exitosa' => 'Se actualizó correctamente']);
    }
    public function eliminar(Curso $curso) {
        $curso->delete();
        return redirect(route('cursos.index'));
    }
} 