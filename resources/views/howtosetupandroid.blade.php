@extends('layout')

@section('main_content')
    <div class="main-container text-light">
        <h1>Как настроить nekobox на android?</h1>
        <h4>0. Скачать обновленную версию nekobox с <a
                href="https://github.com/MatsuriDayo/NekoBoxForAndroid/releases/tag/1.3.4" target="_blanks">github</a>
        </h4>
        <h4>1. Импортировать конфиг</h4>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/add_profile_android.jpg')}}">
        </div>
        <h4>2. Настроить dns(настройки)</h4>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/settings_android.jpg')}}">
        </div>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/dns_android.jpg')}}">
        </div>
        <h4>3. Добавить маршруты из списка(вкладка маршруты)</h4>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/add_route_android.jpg')}}">
        </div>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/route_example_android.jpg')}}">
        </div>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/profiles_example_android.jpg')}}">
            <pre class="img-android">vk.com
yandex.com
yandex.net
yastatic.net
.рф
.ru</pre>
        </div>
        <h4>4. Проверить утечки dns через extended test на сайте <a href="https://www.dnsleaktest.com/" target="_blank">dnsleak</a>
            (результат не должен содержать сервера из России/Украины и должен быть схож с скриншотом)</h4>
        <div class="img-container">
            <img class="card-img img-custom img-android" src="{{asset('./imgs/test.jpg')}}">
        </div>
    </div>
@endsection
