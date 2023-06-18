<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $data = Role::where('name','!=','superadmin')->paginate(100);
        return view('admin.roles.list', compact('data'));
    }
}
