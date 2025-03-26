@extends('layout_admin')

@section('main_content')
    @foreach($users as $user)
        <form class="form-signin form-update-data" id="form-{{$user->id}}}" action="{{route('admin.resetUserPassword.reset')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal text-light">{{$user->login}}</h1>
            <input name="uid" id="uid-{{$user->id}}" value="{{$user->id}}" style="display: none">
            <label for="password" class="sr-only">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Новый пароль" required="" autofocus="">
            <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Сбросить</button>
        </form>
    @endforeach
@endsection
