<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $data = Document::paginate(100);
        $title = "Documents listing";
        return view('admin.document.list', compact('data','title'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Document::create($validatedData);

        return redirect()->back()->with('success', 'Document created successfully.');
    }


    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $validatedData = $this->validateData($request);

        $document->update($validatedData);

        return redirect()->back()->with('success', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'is_required' => 'required',
            'has_expiry_date' => 'required',
            'has_id_number' => 'number',
            'status' => 'required',
        ];

        return $request->validate($rules);
    }
}
