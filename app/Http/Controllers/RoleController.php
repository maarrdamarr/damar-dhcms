<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class RoleController extends BaseController
{
    protected string $mustRole = '';

    public function __construct()
    {
        // pakai middleware bawaan Controller
        $this->middleware(function ($request, $next) {
            if (! Auth::check()) {
                return redirect()->route('login');
            }

            $user = Auth::user();

            if ($this->mustRole !== '' && $user && $user->role !== $this->mustRole) {
                abort(403, 'Anda tidak boleh mengakses halaman ini.');
            }

            return $next($request);
        });
    }
}
