<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function show() {
        $users = DB::select("SELECT users.id, users.first_name, users.last_name, users.email, users.phone, users.address, users.role_id, r.name as role_name FROM users JOIN roles r ON users.role_id = r.id ORDER BY users.created_at ASC");
        Log::debug($users);
        return view("admin.users.show", ["users" => $users]);
    }

    public function edit($id) {
        $user = DB::select("SELECT * FROM users WHERE id = ?", [$id])[0];
        $roles = DB::select("SELECT * FROM roles");
        return view("admin.users.edit", ["user" => $user, "roles" => $roles]);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            "firstName" => "required|string",
            "lastName" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "address" => "nullable|string",
            "roleId" => "required|numeric"
        ]);
        $first_name = $request->input("firstName");
        $last_name = $request->input("lastName");
        $email = $request->input("email");
        $phone = $request->input("phone");
        $address = $request->input("address");
        $role_id = $request->input("roleId");
        DB::update("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ?, role_id = ? WHERE id = ?", [$first_name, $last_name, $email, $phone, $address, $role_id, $id]);
        return redirect()->intended("/admin/users");

    }
}
