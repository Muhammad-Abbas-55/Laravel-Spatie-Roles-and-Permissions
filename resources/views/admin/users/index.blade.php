@extends('admin-layout.main-layout')
@section('content')
    <div class="row" style="justify-content: center">
        <div class="col-sm-8">
            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                @if (@session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <table class="table table-striped" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Ser</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>1.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="" style="display: flex; justify-content: center;">
                                        <div style="margin-right: 10px">
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm"
                                                style="display: inline-block; padding: 7px 20px;  color: white; background-color: green;
                                                border-radius: 5px; text-decoration: none;text-align: center; transition: background-color 0.3s ease;">
                                                Roles</a>
                                        </div>
                                        <div>
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm"
                                                    style="display: inline-block; padding: 7px 20px; color: white; background-color: red;
                                                    border-radius: 5px; text-decoration: none;text-align: center; transition: background-color 0.3s ease;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
