@extends('admin-layout.main-layout')
@section('content')
    <div class="row" style="justify-content: center">
        <div class="col-sm-8">
            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4" style="border: 1px solid gray">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm mb-4"
                            style="display: inline-block; padding: 7px 20px;  color: white; background-color: #007bff;
                            border-radius: 5px; text-decoration: none; text-align: center; transition: background-color 0.3s ease;">
                            Role Index</a>
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $role->name }}"
                                id="name">
                        </div>
                        @error('name')
                            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
                        @enderror
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button></div>
                    </div>
                </form>
            </div>


            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <h2>Permission</h2>
                <div>
                    @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            {{-- <span>{{ $role_permission->name }}</span> // or bleow to show permission and delete --}}
                            <div class="p-2">
                                <form method="POST"
                                    action="{{ route('admin.roles.permissions.rovoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm"
                                        style="display: inline-block; padding: 7px 20px;  color: white; background-color: red;
                                        border-radius: 5px; text-decoration: none;text-align: center; transition: background-color 0.3s ease;">
                                        {{ $role_permission->name }}
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
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
