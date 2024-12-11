<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{asset("./style.css")}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            const form = $("#form");
            form.on("submit", function (event) {
                event.preventDefault()
                const login = $("#login").val();
                const password = $("#password").val();
                const formData = new FormData();
                formData.append("login", login);
                formData.append("password", password);
                fetch('authentication/authenticate', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                }).then(response => response.text()).then(data => {
                    if (data === 'auth_failed') {
                        $("#login_error").text("Неправильный логин или пароль").removeClass("hidden");
                    }
                    if (data === 'auth_success') {
                        window.location.replace('{{route('user.main')}}')
                    }
                })
            });
        })
    </script>
</head>
<body class="text-center align-items-center bg-dark">

<form class="form-signin" id="form">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal text-light">Пожалуйста авторизуйтесь</h1>
    <label for="login" class="sr-only">Логин</label>
    <input id="login" class="form-control" placeholder="Логин" required="" autofocus="">
    <label for="password" class="sr-only">Пароль</label>
    <input type="password" id="password" class="form-control" placeholder="Пароль" >
    <div id="login_error" class="hidden alert badge-danger text-light">Неправильный логин или пароль</div>
    <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Войти</button>
</form>
</body>
</html>
