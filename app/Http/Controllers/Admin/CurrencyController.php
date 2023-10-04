<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $data = Currency::paginate(100);
        $title = "Currency listing";
        return view('admin.currencies', compact('data','title'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Currency::create($validatedData);

        return redirect()->back()->with('success', 'Currency created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $currency = Currency::findOrFail($id);
        $validatedData = $this->validateData($request);

        $currency->update($validatedData);

        return redirect()->back()->with('success', 'Currency updated successfully.');
    }

    public function destroy(Currency $currency): RedirectResponse
    {
        $currency->delete();

        return redirect()->back()->with('success', 'Currency deleted successfully.');
    }

    public function deleteAll(): RedirectResponse
    {
        Currency::truncate();

        return redirect()->back()->with('success', 'All currencies deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'rate' => 'required',
            'no_of_decimal' => 'required',
        ];

        return $request->validate($rules);
    }
}
