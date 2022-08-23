@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/dashboard/user" method="POST">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Role</label>
                        <select name="roles" id="roles" class="form form-control">
                            <option value="">-- Pilih Roles --</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="USER">USER</option>
                        </select>
                        @error('roles')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" value="" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-md">
                            <li class="fa fa-save"></li>SIMPAN
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
