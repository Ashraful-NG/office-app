<?php

// app/Http/Middleware/CheckUserRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
dd('dfd');
        if ($user && $user->role !== $role) {
            // If the user does not have the specified role, you can redirect or handle it as needed
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
