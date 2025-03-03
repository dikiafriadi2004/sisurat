<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function ($query) use ($search){
            if($search) {
                $query->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "{$search}");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:password_confirmation|required_with:password_confirmation',
            'password_confirmation' => 'required_with:password'
        ], [
            'name.required' => 'Name a field is required',
            'email.required' => 'Email a field is required',
            'email.email' => $request->email . 'Email format is not correct',
            'email.unique' => 'Email already exists in the database, please use another email',
            'password.required_with' => 'Password a field is required',
            'password_confirmation.required_with' => 'Confirmation Password a field is required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        $newUser = User::create($data);
        $newUser->syncPermissions($request->permissions);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $permissions = Permission::get();
        $userPermissions = $user->getPermissionNames()->toArray();
        return view('admin.users.edit', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'new_password' => 'nullable|min:6|same:new_password_confirmation|required_with:new_password_confirmation',
            'new_password_confirmation' => 'required_with:new_password'
        ], [
            'name.required' => 'Name a field is required',
            'email.required' => 'Email a field is required',
            'email.email' => $request->email . 'Email format is not correct',
            'email.unique' => 'Email already exists in the database, please use another email',
            'new_password.required_with' => 'Password a field is required',
            'new_password_confirmation.required_with' => 'Confirmation Password a field is required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->new_password ? bcrypt($request->new_password) : $user->password
        ];

        User::where('id', $user->id)->update($data);

        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        return redirect()->back()->with('success', 'Data user berhasil dihapus');
    }
}
