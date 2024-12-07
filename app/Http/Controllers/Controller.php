<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {

        $user = Auth::user();
        if ($user == null) {
            return redirect('/login');
        }

        if ($user->type == 1) {
            return redirect('/dashboard');
        } else if ($user->type == 0) {
            return redirect('/stokOpname');
        } else if ($user->type == 2) {
            return redirect('/staffDashboard');
        }
    }
}
