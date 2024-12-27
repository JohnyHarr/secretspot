@extends('layout')

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
            document.querySelectorAll(".copy").forEach(copyButton => {
                copyButton.addEventListener('click', () => {
                    const targetElement = $(copyButton.dataset.copy);
                    const text = targetElement.text()
                        .replace(/\s+/g, " ").trim();
                    copyToClipboard(text)
                })
            })
        })
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
    <div class="main-container text-light">
        <h1>Как настроить?</h1>
        <h4 class="text-warning"><a href="{{route('user.howToSetupAndroid')}}">Как настроить на android</a></h4>
        <h4>0. <a href="https://github.com/MatsuriDayo/nekoray/releases/tag/4.0.1" target="_blank">Скачать обновленный nekoray</a>
        </h4>
        <h4>1. Импортируйте и запустите профиль:</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/add_profile.png')}}">
        </div>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/run_profile.png')}}">
        </div>
        <h4>2. Настройте режим tun(настройки -> настройки tun-режима)</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/tun_setup.png')}}">
        </div>
        <h4>3. Настройте выбор dns(настройки -> настройки маршрутов -> dns)</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/dns.png')}}">
        </div>
        <h4>4. Настройте маршрутизацию (настройки -> настройки маршрутов -> общие -> кастомные маршруты(global))
            (вставьте код ниже)</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/routes.png')}}">
        </div>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/routes2.png')}}">
            <pre id="routingRules">{
    "rules": [
        {
            "domain": [
                "animego.com"
            ],
            "outbound": "direct"
        },
        {
            "domain_suffix": [
                ".ru",
                ".рф",
                ".gov",
                "vk.com",
                "yandex.com",
                "yandex.net",
                "yastatic.net"
            ],
            "outbound": "direct"
        }
    ]
}
</pre>
            <button type="button" class="copy" data-copy="#routingRules">
                <ion-icon name="clipboard-outline" class="copy-icon"></ion-icon>
                <span class="copy-label">Копировать</span>
            </button>
        </div>
        <h4>5. Настройте политику обработки ip адрессов</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/directIp.png')}}">
        </div>
        <h4>6. Проверить утечки dns через extended test на сайте <a href="https://www.dnsleaktest.com/" target="_blank">dnsleak</a>
            (результат не должен содержать сервера из России/Украины и должен быть схож с скриншотом)</h4>
        <div class="img-container">
            <img class="card-img img-custom" src="{{asset('./imgs/dnsleak.png')}}">
        </div>
    </div>
@endsection
