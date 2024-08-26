<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <!-- <title>Gerenciamento de Cookies</title> -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #footer {
            background-color: rgba(51, 51, 51, 0.8); /* Fundo preto com 80% de transparência */
            color: white;
            text-align: center;
            padding: 60px;
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 5px 5px 5px 5px red;
        }
        #closeButton {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        #closeButton:hover {
            background-color: #000000;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="footer">
        <span>Bem-vindo de volta, <span id="username">convidado</span>! Aproveite sua sessão.</span>
        <button id="closeButton" onclick="closeFooter()">Fechar</button>
    </div>
    
    <script>
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function deleteCookie(name) {
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }

        function closeFooter() {
            document.getElementById("footer").style.display = "none";
        }

        // Criar um cookie
        setCookie("username", "usuario_aproveite", 7);

        // Ler o cookie
        const username = getCookie("username");
        if (username) {
            document.getElementById("username").innerText = username;
        } else {
            document.getElementById("username").innerText = "convidado";
        }
    </script>
</body>
</html>



