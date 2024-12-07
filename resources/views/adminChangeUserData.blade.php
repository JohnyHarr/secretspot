@extends('layout_admin')
@section('main_content')
    @foreach($users as $user)
        <form class="form-signin form-update-data" id="form" action="{{route('admin.updateUserData.update')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal text-light">{{$user->login}}</h1>
            <input name="uid" id="uid" value="{{$user->id}}" style="display: none">
            <label for="aeza" class="sr-only">Aeza</label>
            <textarea id="aeza" name="aeza" class="form-control text-area" placeholder="Aeza"
                      autofocus="">{{$user->vpnConfigs->aeza}}</textarea>
            <textarea id="hostVDS" name="hostVDS" class="form-control text-area" placeholder="HostVDS"
                      autofocus="">{{$user->vpnConfigs->hostVDS}}</textarea>
            <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Save</button>
            <button class="btn btn-lg btn-primary btn-danger btn-block" type="submit"
                    formaction="{{route('admin.updateUserData.delete')}}">Delete
            </button>
        </form>
    @endforeach
@endsection
