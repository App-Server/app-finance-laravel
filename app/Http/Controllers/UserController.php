<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUpdateUser;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(50);
        return view('user.index', compact('users'));
    }

    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $users = User::create($data);
        session()->flash('success', 'User registered successfully');
        return redirect()->route('user.index'); 
    }

    public function edit($id)
    {
        if (!$user = User::find($id))
        return redirect()->route('user.index');
        return view('user.edit', compact('user'));
    }

    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = User::find($id))
        return redirect()->route('user.edit');
        $data = $request->only('name', 'email');
        if ($request->password)
        $data['password'] = bcrypt($request->password);
        $user->update($data);
        session()->flash('success', 'Update User registered successfully!');
        return redirect()->route('user.edit', $user->id);
    }
}
