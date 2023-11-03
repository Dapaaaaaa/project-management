<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleManagementController extends Controller
{
    public function create(){
        $roles = Role::pluck('name', 'id');
    return view('roles.index', compact('roles'));
    }

    public function edit(User $user)
{
    $roles = Role::all();
    return view('roles.edit', compact('user', 'roles'));
}

public function manageRoles(User $user)
{
    if (Gate::allows('project-management', $user)) {
        // Izinkan pengguna mengatur peran pengguna
        // Implementasikan logika perubahan peran di sini
    } else {
        abort(403, 'Anda tidak memiliki izin untuk mengatur peran pengguna.');
    }
}

public function update(Request $request, User $user)
{
    $this->authorize('project-management');
    // Lakukan tindakan yang sesuai di sini
    $user->syncRoles($request->input('roles'));
    return redirect()->route('users.index')->with('success', 'Peran pengguna diperbarui.');
}

}
