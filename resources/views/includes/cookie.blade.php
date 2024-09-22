<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie de Aceitação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #cookieConsent {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: none;
        }
        .cookie-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .cookie-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>


    <!-- Aviso de Cookies -->
    <div id="cookieConsent">
        <span>Este site usa cookies para garantir a melhor experiência. Aceite para continuar navegando.</span>
        <button class="cookie-btn" onclick="acceptCookies()">Aceitar</button>
    </div>

    <script>
        // Função para definir um cookie
        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000)); // Calcula o tempo de expiração
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        // Função para pegar um cookie
        function getCookie(name) {
            const decodedCookie = decodeURIComponent(document.cookie);
            const ca = decodedCookie.split(';');
            name = name + "=";
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        // Função para aceitar cookies
        function acceptCookies() {
            setCookie('siteAcceptedCookies', 'true', 7); // Define o cookie por 7 dias
            document.getElementById('cookieConsent').style.display = 'none';
        }

        // Mostrar o aviso se o cookie ainda não estiver definido
        window.onload = function() {
            const userAccepted = getCookie('siteAcceptedCookies');
            if (userAccepted != 'true') {
                document.getElementById('cookieConsent').style.display = 'block';
            }
        }
    </script>

</body>
</html>
