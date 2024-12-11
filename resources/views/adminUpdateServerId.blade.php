@extends('layout_admin')
@section('title')
    Обновление Id сервера
@endsection
@section('main_content')
    @foreach($servers as $server)
        <form class="form-signin form-update-data" id="form" action="{{route('admin.updateServerId.update')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal text-light">{{$server->server_name}}</h1>
            <input name="sid" id="sid" value="{{$server->id}}" style="display: none">
            <label for="aeza" class="sr-only">Aeza</label>
            <textarea id="aeza" name="newServerId" class="form-control text-area" placeholder="server id"
                      autofocus="">{{$server->server_id}}</textarea>
            <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Сохранить</button>
        </form>
    @endforeach
@endsection
