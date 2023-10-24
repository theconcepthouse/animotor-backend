<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        if(isOwner()){
            $data = Faq::where('company_id', companyId())->paginate(100);
        }else{
            $data = Faq::paginate(100);
        }
        $title = "FAQs listing";
        return view('admin.faqs.list', compact('data','title'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

        if(isOwner()){
            $validatedData['company_id'] = companyId();
        }
        Faq::create($validatedData);

        return redirect()->back()->with('success', 'Faq created successfully.');
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $make = Faq::findOrFail($id);
        $validatedData = $this->validateData($request);

        $make->update($validatedData);

        return redirect()->back()->with('success', 'Faq updated successfully.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->back()->with('success', 'Faq deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        return $request->validate($rules);
    }
}
