@extends('layout_admin')
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
                        $("#login_error").text("Что-то пошло не так").removeClass("hidden");
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
    <form class="form-signin" id="form">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal text-light">Please enter credentials</h1>
        <label for="login" class="sr-only">Email address</label>
        <input id="login" name="login" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
        <label for="role" class="sr-only">Role</label>
        <input name="role" id="role" class="form-control" placeholder="Role" required="">
        <div id="login_error" class="hidden alert-warning"></div>
        <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Register</button>
    </form>
@endsection
