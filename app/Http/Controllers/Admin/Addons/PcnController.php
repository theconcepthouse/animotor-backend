<?php

namespace App\Http\Controllers\Admin\Addons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PcnController extends Controller
{
    public function index()
    {
        return view('admin.addons.pcn.lists');
    }

    public function carPCNs($id)
    {
        return view('admin.addons.pcn.list_by_car', compact('id'));
    }

    public function show($id)
    {
        return view('admin.addons.pcn.show', compact('id'));
    }


    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'make_for' => 'required',
        ];

        return $request->validate($rules);
    }
}
