<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable){
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return $dataTable->render('admin.user.userList');
    }

    public function show(User $user){
        return view('admin.user.showUser',compact('user'));
    }

    public function create(){
        return view('admin.user.tambahUser');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required",
            "username" => "required|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|min:5",
            "role" => "required",
        ]);

        try {
            $validated["password"] = Hash::make($validated["password"]);
            $user = User::create($validated);
            $user->assignRole($request->role);
            return redirect()->route("userList")->with('success', 'Data '.ucwords($validated["name"]).' berhasil ditambahkan!');

        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data '.ucwords($validated["name"]).' gagal ditambahkan!');
        }

    }

    public function edit(User $user){
        return view('admin.user.editUser',compact('user'));
    }
    public function update(User $user, Request $request){

        try {
            if ($request->password) {
                $user->update([
                    "name" => $request->name,
                    "username" => $request->username,
                    "email" => $request->email,
                    "password" => $request->password,
                ]);
                $user->syncRoles($request->role);
            }else{
                $user->update([
                    "name" => $request->name,
                    "username" => $request->username,
                    "email" => $request->email,
                ]);
                $user->syncRoles($request->role);
            }
            return redirect()->route("userList")->with('success', 'Data '.ucwords($user["name"]).' berhasil diperbarui!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data '.ucwords($user["name"]).' gagal diperbarui!');

        }

    }

    public function hapus(User $user){
        try {
            $user->delete();
            return redirect()->route("userList")->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->route("userList")->with('error', 'Gagal menghapus data!');

        }
    }
}
