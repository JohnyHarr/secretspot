@extends('layout_admin')

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        const unsecuredCopyToClipboard = (text) => {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy')
            } catch (err) {
                console.error('Unable to copy to clipboard', err)
            }
            document.body.removeChild(textArea)
        };

        $(document).ready(function () {
            $('#form').on('submit', event => {
                event.preventDefault()
                generateKey(
                    $('#uuid').val(),
                    $('#privkey').val(),
                    $('#pubkey').val(),
                    $('#shortid').val(),
                    $('#email').val(),
                    $('#ip').val(),
                    $('#sni').val(),
                    $('#port').val(),
                );
            })
            document.querySelectorAll(".copy").forEach(copyButton => {
                copyButton.addEventListener('click', () => {
                    const targetElement = $(copyButton.dataset.copy);
                    const text = targetElement.text()
                        .replace(/\s+/g, " ").trim();
                    copyToClipboard(text)
                })
            })
        })

        const generateKey = (uuid, privkey, pubkey, shorId, email, ip, sni, port) => {
            $('#generatedKey').text('vless://'
                + uuid + '@' + ip + ':' + port + '?security=reality&encryption=none&pbk='
                + pubkey + '&headerType=none&fp=chrome&type=tcp&flow=xtls-rprx-vision&sni='
                + sni + '&sid=' + shorId + '#vpn-' + email + '')
        }

        const copyToClipboard = (content) => {
            if (window.isSecureContext && navigator.clipboard) {
                navigator.clipboard.writeText(content);
            } else {
                unsecuredCopyToClipboard(content);
            }
        };

    </script>
@endsection

@section('main_content')
    <form class="form-signin user-registration form-update-data" id="form">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal text-light">Генерация ключей доступа</h1>
        <input id="uuid" name="uuid" class="form-control" placeholder="uuid" autofocus="">
        <input id="privkey" name="privkey" class="form-control " placeholder="privkey" autofocus="">
        <input id="pubkey" name="pubkey" class="form-control" placeholder="pubkey" autofocus="">
        <input id="shortid" name="shortid" class="form-control" placeholder="shortid" autofocus="">
        <input id="ip" name="ip" class="form-control" placeholder="ip" autofocus="">
        <input id="email" name="email" class="form-control" placeholder="email" autofocus="">
        <input id="sni" name="sni" class="form-control" placeholder="sni" autofocus="">
        <input id="port" name="port" class="form-control" placeholder="port" autofocus="">
        <button class="btn btn-lg btn-primary btn-warning btn-block" type="submit">Сгенерировать</button>
    </form>
    <div class="form-signin form-update-data" style="margin-top: 100px; margin-bottom: 150px">
        <pre id="generatedKey">vless://</pre>
        <button type="button" class="copy" data-copy="#generatedKey">
            <ion-icon name="clipboard-outline" class="copy-icon"></ion-icon>
            <span class="copy-label">Копировать</span>
        </button>
    </div>
@endsection
