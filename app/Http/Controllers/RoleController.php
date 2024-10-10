<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();
       
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        
        return view('admin.roles.create');
    }

    public function store(Request $request){
        // dd($request);

        $role = $request->validate([
            'name' =>'required|unique:roles|max:255',
        ]);

        Role::create($role);

        return redirect()->route('admin.roles.index')->with('status', 'Role created successfully');
    }

    
    public function edit($id){  

        $role = Role::find($id);

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role','permissions'));
    
    }

    public function update(Request $request, $id){

        $role = $request->validate([
            'name' =>'required|unique:roles|max:255',
        ]);
        $role = Role::find($id);

        $role->update($request->all());


        return redirect()->route('admin.roles.index')->with('status', 'Role updated successfully');
    }

    // public function show(Request $request, $id){
    //     dd("helo");
    // }

    public function destroy($id){   
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('status', 'Role deleted successfully');
    }



    public function givePermission(Request $request, Role $role)
    {
        // dd($request->permission);
        if($role->hasPermissionTo($request->permission)){
            return back()->with('status', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('status', 'Permission granted');
    }

    public function revokePermission(Role $role, Permission $permission){
        
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('status', 'Permission revoked');
        }

        return back()->with('status', 'Permission not exists');
    }



}