<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index() {
        $employers = User::where('role','employer')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.employers.index', compact('employers'));
    }

    public function create() {
        return view('admin.employers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'employer',
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('admin.employers.index')->with('success','Employer added');
    }

    public function edit(User $employer) {
        return view('admin.employers.edit', compact('employer'));
    }

    public function update(Request $request, User $employer) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$employer->id
        ]);

        $employer->update($request->only(['name','email']));
        return redirect()->route('admin.employers.index')->with('success','Employer updated');
    }

    public function destroy(User $employer) {
        $employer->delete();
        return redirect()->route('admin.employers.index')->with('success','Employer deleted');
    }
}
