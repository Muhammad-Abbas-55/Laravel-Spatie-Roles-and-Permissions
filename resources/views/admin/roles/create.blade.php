@extends('admin-layout.main-layout')
@section('content')
    <div class="row" style="justify-content: center">
        <div class="col-sm-8">
            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>                
            @endif
            <div class="card-body p-0" style="margin: 50px 50px 50px 0">
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="card-body p-4" style="border: 1px solid gray">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm mb-4"
                            style="display: inline-block; padding: 7px 20px;  color: white; background-color: #007bff;
                            border-radius: 5px; text-decoration: none; text-align: center; transition: background-color 0.3s ease;">
                            Role Index</a>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        @error('name')
                            <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
                        @enderror
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
