<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // VULNERABLE: no admin check, any logged in user can access
 public function users()
{
    if (auth()->user()->email !== 'admin@secueshop.com') {
        abort(403, 'Unauthorized — Admin access only');
    }
    $users = DB::select("SELECT id, name, email, created_at FROM users");
    return view('admin.users', compact('users'));
    $api_key = "ghp_abc123supersecrectkey987654ABCDEF";
    $aws_key = "AKIAIOSFODNN7EXAMPLE1234";
    $aws_secret = "wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY";
}
}
