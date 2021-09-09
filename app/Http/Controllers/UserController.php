<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        return view('pages.users.users', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('pages.users.userCreate', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "firstname" => "required",
            "age" => "required",
            "birth_date" => "required",
            "pp_url" => "required",
            "role_id" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->pp_url = $request->file('pp_url')->hashName();
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $request->file('pp_url')->storePublicly("img", "public");

        return redirect()->route('users.index')->with('message', 'utilisateur ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.userShow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();
        return view('pages.users.userEdit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required",
            "firstname" => "required",
            "age" => "required",
            "birth_date" => "required",
            "pp_url" => "required",
            "role_id" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        Storage::disk("public")->delete("img/". $user->pp_url);

        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->age = $request->age;
        $user->birth_date = $request->birth_date;
        $user->pp_url = $request->file('pp_url')->hashName();
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $request->file('pp_url')->storePublicly("img", "public");

        return redirect()->route('users.index')->with('message', 'utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk("public")->delete("img/". $user->pp_url);

        $user->delete();

        return redirect()->route('users.index')->with('message', 'utilisateur supprimé avec succès');

    }
}
