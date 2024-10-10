<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(){
       
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));

    }

    public function create(){
        
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        // dd($request);

        $permission = $request->validate([
            'name' =>'required|unique:roles|max:255',
        ]);

        Permission::create($permission);

        return redirect()->route('admin.permissions.index')->with('status', 'Role created successfully');
    }


    public function edit($id){

        $permission = Permission::find($id);
        $roles = Role::all();

        return view('admin.permissions.edit', compact('permission','roles'));
    
    }
    
    public function update(Request $request, $id){

        $permission = $request->validate([
            'name' =>'required|unique:permissions|max:255',
        ]);
        $permission = Permission::find($id);
        // dd($permission);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.index')->with('status', 'pPermission updated successfully');
    }


    public function destroy($id){   
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('status', 'Permission deleted successfully');
    }


    public function assignRole(Request $request, Permission $permission)
    {
        // dd($request->role);
        if($permission->hasRole($request->role)){ 
            return back()->with('status', 'Role exists');
        }
        $permission->assignRole($request->role);
        return back()->with('status', 'Role granted');
    }


    public function removeRole(Permission $permission, Role $role){
        
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('status', 'Role removed');
        }

        return back()->with('status', 'Role not exists');
    }
}
