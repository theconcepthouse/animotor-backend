<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $data = Rental::paginate(100);
        $title = "Rentals listing";
        return view('admin.rental.list', compact('data','title'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Rental::create($validatedData);

        return redirect()->back()->with('success', 'Rental created successfully.');
    }


    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $validatedData = $this->validateData($request);

        $rental->update($validatedData);

        return redirect()->back()->with('success', 'Rental updated successfully.');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);

        $rental->delete();

        return redirect()->back()->with('success', 'Rental deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'period' => 'required',
            'description' => 'nullable',
            'is_active' => 'required',
        ];

        return $request->validate($rules);
    }
}
