@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/dashboard/user/{{ $datauser->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12 col-xs-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $datauser->name, old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $datauser->email, old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Role</label>
                        <select name="roles" id="roles" class="form form-control">
                            <option value="">-- Pilih Roles --</option>
                            <option value="ADMIN" {{ $datauser->roles == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                            <option value="USER" {{ $datauser->roles == 'USER' ? 'selected' : '' }}>USER</option>
                        </select>
                        @error('roles')
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
