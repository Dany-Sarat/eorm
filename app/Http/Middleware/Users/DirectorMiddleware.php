<?php
namespace App\Http\Middleware\Users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class DirectorMiddleware
{
    private const ROL_DIRECTOR = 'DIRECTOR';
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->rol != self::ROL_DIRECTOR) {
            abort(404); 
        }
        return $next($request);
    }
}