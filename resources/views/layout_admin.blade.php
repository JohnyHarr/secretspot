<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{asset("./style.css")}}" rel="stylesheet">
    @yield('scripts')
</head>
<body class="bg-dark">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 text-light bg-dark border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal "><a class="text-light" href="{{route('user.main')}}">JohnyHarr's Secret Spot</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-light" href="{{route('admin.registration')}}">Добавить пользователя</a>
        <a class="p-2 text-light" href="{{route('admin.updateUserData')}}">Изменить пользователя</a>
        <a class="p-2 text-light" href="{{route('admin.updateServerId')}}">Изменить ид сервера</a>
        <a class="p-2 text-light" href="{{route('admin.keygen')}}">Сгенерировать ключ</a>
        <a class="p-2 text-light" href="https://finland-panel.johnyharr.ru/update-data/" target="_blank">Панель Хельсинки</a>
    </nav>
    <a class="btn btn-outline-warning" href="{{route('user.logout')}}">Выйти</a>
</div>
@yield('main_content')
<footer></footer>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php
