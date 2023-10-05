<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        MenuItem::create($validatedData);

        return redirect()->back()->with('success', 'Menu item created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $make = MenuItem::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        return redirect()->back()->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menu): RedirectResponse
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Menu item deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'label' => 'required',
            'menu_id' => 'nullable',
            'parent_id' => 'nullable',
            'url' => 'required',
            'icon' => 'nullable',
            'icon_type' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
