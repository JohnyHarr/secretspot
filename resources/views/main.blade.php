@extends("layout")
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{asset('./ping.js')}}"></script>
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
        const handleMonitors = (data) => {
            data.monitors.forEach((monitor) => {
                console.log(monitor)
                $('#hostingName' + monitor.id).text(monitor.friendly_name + ': ');
                if (monitor.status == 2) {
                    const span = jQuery('<span>', {
                        id: 'status'+monitor.id
                    }).appendTo('#hostingName'+monitor.id)
                    span.text('online').css('color', 'green');
                } else {
                    const span = jQuery('<span>', {
                        id: 'status'+monitor.id
                    }).appendTo('#hostingName'+monitor.id)
                    span.text('offline').css('color', 'red');
                }
            })

        }

        fetch("https://api.uptimerobot.com/v2/getMonitors", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                api_key: 'ur2752544-c653eb51414b480fc5dd7915'
            })
        })
            .then(response => {
                return response.json()
            })
            .then(data => {
                handleMonitors(data)
            })
            .catch(err => console.log(err))
    </script>
@endsection
@section('main_content')
    <div class="main-container text-light">
        <h1>Добро пожаловать, {{$user->login}}</h1>
        <h4>VPN конфиги: </h4>
        <div class="vpn-container">
            <h5 id="hostingName{{$aezaId}}"><span id="status{{$aezaId}}" style="color: orange">Loading status...</span></h5>
            <pre id="aezaConfig">{{$user->vpnConfigs()->first()->aeza}}</pre>
            <button type="button" class="copy" data-copy="#aezaConfig">
                <ion-icon name="clipboard-outline" class="copy-icon"></ion-icon>
                <span class="copy-label">Копировать</span>
            </button>
        </div>
        <div class="vpn-container">
            <h5 id="hostingName{{$hostVDSId}}"><span id="status{{$hostVDSId}}" style="color: orange">Loading status...</span></h5>
            <pre id="hostVDSConfig">{{$user->vpnConfigs()->first()->hostVDS}}</pre>
            <button type="button" class="copy" data-copy="#hostVDSConfig">
                <ion-icon name="clipboard-outline" class="copy-icon"></ion-icon>
                <span class="copy-label">Копировать</span>
            </button>
        </div>
    </div>
@endsection
