<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CancellationReason;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CancellationReasonController extends Controller
{
    public function index()
    {
        $data = CancellationReason::paginate(100);
        $title = "Cancellation reasons";
        return view('admin.cancellation_reasons.list', compact('data','title'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        CancellationReason::create($validatedData);

        return redirect()->back()->with('success', 'Cancellation reason created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $CancellationReason = CancellationReason::findOrFail($id);
        $validatedData = $this->validateData($request, $CancellationReason);

        $CancellationReason->update($validatedData);

        return redirect()->route('CancellationReason.index')->with('success', 'CancellationReason updated successfully.');
    }

    public function destroy($id)
    {
        $CancellationReason = CancellationReason::findOrFail($id);

        $CancellationReason->delete();

        return redirect()->back()->with('success', 'Cancellation Reason deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'user_type' => 'required',
            'reason' => 'required',
            'is_active' => 'required'
        ];

        return $request->validate($rules);
    }
}
