@extends('layout')

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            const password = $('#password')
            const confirmPassword = $('#confirm-password')
            password.on('input', function () {
                checkIfPasswordAreSame(password.val(), confirmPassword.val())
            })
            confirmPassword.on('input', function () {
                checkIfPasswordAreSame(password.val(), confirmPassword.val())
            })
            $('#form').submit(event=>{
                event.preventDefault()
                const formData = new FormData();
                const password = $('#password').val()
                formData.append("password", password);
                fetch('{{route('user.update-password.update')}}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                }).then(response => response.text()).then(data => {
                    if (data === 'failed') {
                        $("#error").text("Ошибка изменения").prop('hidden', false);
                    }
                    if (data === 'success') {
                        $('#success').prop('hidden', false)
                    }
                })
            })
        })

        const checkIfPasswordAreSame = (pass, confirmPass) => {
            const btn = $('.btn')
            const error = $('#error')
            error.text('Пароли не совпадают(пароль должен быть длиннее 8 символов)')
            btn.prop('disabled', true)
            error.prop('hidden', false)
            if (pass === confirmPass && pass.length >= 8) {
                btn.prop('disabled', false)
                error.prop('hidden', true)
            }
        }

    </script>
@endsection

@section('main_content')
    <form class="form-signin" id="form">
        @csrf
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" id="password" class="form-control" placeholder="Новый пароль" required="" autofocus="">
        <label  for="password" class="sr-only">Пароль</label>
        <input type="password" id="confirm-password" class="form-control" placeholder="Повторите пароль">
        <div id="error" class="badge-danger  alert badge-danger text-light" hidden></div>
        <div id="success" class="badge-success alert text-light" hidden>Пароль изменен</div>
        <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit" disabled>Изменить пароль</button>
    </form>
@endsection
