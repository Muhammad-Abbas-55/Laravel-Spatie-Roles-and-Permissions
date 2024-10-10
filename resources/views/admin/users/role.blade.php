@extends('admin-layout.main-layout')
@section('content')
    <div class="row" style="justify-content: center">
        <div class="col-sm-8">
            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <div class="card-body">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm mb-4"
                        style="display: inline-block; padding: 7px 20px;  color: white; background-color: #007bff;
                        border-radius: 5px; text-decoration: none; text-align: center; transition: background-color 0.3s ease;">
                        User Index</a>
                </div>
                <div>User Name : {{ $user->name }} </div>
                <div>User Email : {{ $user->email }} </div>
            </div>




            {{-- Role section --}}



            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <h2>Roles</h2>
                <div>
                    @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                            {{-- <span>{{ $permission_role->name }}</span> // or bleow to show permission and delete --}}
                            <div class="p-2">
                                <form method="POST"
                                    action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm"
                                        style="display: inline-block; padding: 7px 20px;  color: white; background-color: red;
                                        border-radius: 5px; text-decoration: none;text-align: center; transition: background-color 0.3s ease;">
                                        {{ $user_role->name }}
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                    @csrf
                    <div class="card-body p-4" style="border: 1px solid gray">
                        <div class="mb-3">
                            <label for="role" class="form-label">Select Role Name</label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer"> <button type="submit" class="btn btn-success">Assign</button></div>
                    </div>
                </form>
            </div>





            {{-- Permission Section --}}

            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <h2>Permissions</h2>
                <div>
                    @if ($user->permissions)
                        @foreach ($user->permissions as $user_permission)
                            {{-- <span>{{ $role_permission->name }}</span> // or bleow to show permission and delete --}}
                            <div class="p-2">
                                <form method="POST"
                                    action="{{ route('admin.users.permissions.rovoke', [$user->id, $user_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm"
                                        style="display: inline-block; padding: 7px 20px;  color: white; background-color: red;
                                        border-radius: 5px; text-decoration: none;text-align: center; transition: background-color 0.3s ease;">
                                        {{ $user_permission->name }}
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                    @csrf
                    <div class="card-body p-4" style="border: 1px solid gray">
                        <div class="mb-3">
                            <label for="permission" class="form-label">Select Permission Name</label>
                            <select name="permission" id="permission" class="form-control">
                                <option selected disabled>Select Permission</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('name')
                            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
                        @enderror
                        <div class="card-footer"> <button type="submit" class="btn btn-success">Assign</button></div>
                    </div>
                </form>
            </div>





        </div>
    </div>
@endsection
