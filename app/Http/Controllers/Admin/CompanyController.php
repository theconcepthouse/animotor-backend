<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        $data = User::with('company.bookings')->whereHasRole('owner')->paginate(100);
        $title = "Company listing";
        return view('admin.company.list', compact('data','title'));
    }

    public function create()
    {
        $countries = Country::where('is_active', true)->get();
        return view('admin.company.create', compact('countries'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->validateData($request);

        $company = Company::create($data);

        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->first_name = $data['owner'];
        $user->company_id = $company->id;
        $user->save();

        $user->addRole('owner');


        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
    }

    public function edit($id)
    {

        $countries = Country::where('is_active', true)->get();
        $user = User::findOrFail($id);
        $company = $user->company;
        return view('admin.company.edit', compact('company','user','countries'));
    }

    public function update(Request $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($request->user_id);

        $data = $this->validateData($request, $company, $user);

        $company->update($data);

        $user = User::findOrFail($request->user_id);
        if ($request->get('password')){
            $user->password = Hash::make($data['password']);
        }
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->status = $data['status'];
        $user->first_name = $data['owner'];
        $user->save();

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();



        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }

    private function validateData(Request $request, Company $company = null, User $user = null): array
    {
        $rules = [
            'name' => 'required|unique:companies,name',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'owner' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'password' => 'nullable',
            'state' => 'required',
            'country' => 'required',
            'tin' => 'required',
            'status' => 'nullable',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
        ];

        if ($company) {
            $rules['name'] = ['required', Rule::unique('companies')->ignore($company->id),];
        }
        if ($user) {
            $rules['phone'] = ['required', Rule::unique('users')->ignore($user->id),];
            $rules['email'] = ['required', Rule::unique('users')->ignore($user->id),];
        }

        return $request->validate($rules);
    }
}
