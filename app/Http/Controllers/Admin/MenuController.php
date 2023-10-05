<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        Menu::create($validatedData);

        return redirect()->back()->with('success', 'Menu created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $make = Menu::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        return redirect()->back()->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $type = $request->input('type');

        if($type == 'menu'){
            Menu::findOrFail($id)->delete();
        }else{
            MenuItem::findOrFail($id)->delete();
        }

        return redirect()->back()->with('success', 'Menu deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'slug' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
