<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{asset("./style.css")}}" rel="stylesheet">
    @yield('scripts')
</head>
<body class="bg-dark">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 text-light bg-dark border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">JohnyHarr's Secret Spot</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
        <a class="p-2 text-light" href="{{route('admin.updateUserData')}}">Админка</a>
        @endif
        <a class="p-2 text-light" href="{{route('user.update-password')}}">Изменить пароль</a>
    </nav>
    <a class="btn btn-outline-warning" href="{{route('user.logout')}}">Выйти</a>
</div>
@yield('main_content')
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
