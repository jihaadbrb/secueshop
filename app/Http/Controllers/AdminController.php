<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // VULNERABLE: no admin check, any logged in user can access
    public function users()
    {
        $users = DB::select("SELECT id, name, email, created_at FROM users");
        return view('admin.users', compact('users'));
    }
}