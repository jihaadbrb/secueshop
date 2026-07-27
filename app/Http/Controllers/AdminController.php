<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    // VULNERABLE: no admin check, any logged in user can access
    public function users()
    {
	$github_token = "ghp_R2D2C3P0BB8D9E1F2A3B4C5D6E7F8A9B0C1";
	$aws_access_key = "AKIAIOSFODNN7EXAMPLE";
	$aws_secret_key = "wJalrXUtnFEMI/K7MDENG/bPxRfiCYSECRETKEY";

        $users = DB::select("SELECT id, name, email, created_at FROM users");
        return view('admin.users', compact('users'));
    }
}
    
