<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function admin_user_index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user','roles','permissions'));
    }



//  given Roles to user function

    public function assignRole(Request $request, User $user)
    {
        // dd($request->role);
        if($user->hasRole($request->role)){ 
            return back()->with('status', 'Role exists');
        }
        $user->assignRole($request->role);
        return back()->with('status', 'Role granted to user');
    }


    public function removeRole(User $user, Role $role){
        
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('status', 'Role removed from user');
        }

        return back()->with('status', 'Role does not exists');
    }



//  given permissions to user function

    public function givePermission(Request $request, User $user)
    {
        // dd($request->permission);
        if($user->hasPermissionTo($request->permission)){
            return back()->with('status', 'Permission exists');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('status', 'Permission granted to user');
    }


    public function revokePermission(User $user, Permission $permission){
        
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('status', 'Permission revoked from user');
        }

        return back()->with('status', 'Permission does not exists');
    }









    public function destroy (User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('status','This user is Admin');
        }
        $user->delete();

        return back()->with('status','User deleted successfully');
    }
}
