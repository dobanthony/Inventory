<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleBasedDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (! $user) {
            abort(401, 'Unauthenticated.');
        }

        if ($user->isAdmin()) {
            return inertia('Admin/Dashboard', [
                'user' => $user,
            ]);
        }

        if ($user->isStaff()) {
            return inertia('Staff/Dashboard', [
                'user' => $user,
            ]);
        }

        // fallback for unknown role
        abort(403, 'Unauthorized role.');
    }
}
