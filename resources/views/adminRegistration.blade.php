@extends('layout_admin')
@section('title')
    Регистрация пользователя
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            const form = $("#form");
            form.on("submit", function (event) {
                event.preventDefault()
                const login = $("#login").val();
                const password = $("#password").val();
                const role = $("#role").val();
                const formData = new FormData();
                formData.append("login", login);
                formData.append("password", password);
                formData.append("role", role);
                fetch('/admin/user-registration/register', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                }).then(response => response.text()).then(data => {
                    if (data === 'reg_failed') {
                        $("#login_error").text("Что-то пошло не так. Возможно логин уже занят").removeClass("hidden");
                    }
                    if (data === 'reg_success') {
                        $("#login_error").text("Зарегистрирован").removeClass("hidden")
                    }
                })
            });
        })
    </script>
@endsection
@section('main_content')
    <form class="form-signin user-registration" id="form">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal text-light">Данные пользователя</h1>
        <label for="login" class="sr-only">Логин</label>
        <input id="login" name="login" class="form-control" placeholder="Логин" required="" autofocus="">
        <label for="password" class="sr-only">Пароль</label>
        <input name="password" id="password" class="form-control" placeholder="Пароль" required="">
        <label for="role" class="sr-only">Роль(user/admin)</label>
        <input name="role" id="role" class="form-control" placeholder="Роль(user/admin)" required="">
        <div id="login_error" class="hidden alert badge-danger"></div>
        <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Зарегистрировать</button>
    </form>
@endsection
