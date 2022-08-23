@extends('layouts.admin.kerangka')
@section('content')
    <a href="/dashboard/user/{{ $datauser->id }}/edit" class="btn btn-success btn-md">
        <li class="fa fa-edit"></li> Perbaharui Data
    </a>
    <hr>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-4">Name User</div>
                <div class="col-md-6">: {{ $datauser->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">Email</div>
                <div class="col-md-6">: {{ $datauser->email }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">Roles</div>
                <div class="col-md-6">: {{ $datauser->roles }}</div>
            </div>
        </div>
    </div>
@endsection
