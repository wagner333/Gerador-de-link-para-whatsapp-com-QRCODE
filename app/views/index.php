<?php
// Verifica se os dados foram enviados
$whatsappLink = '';
if (isset($_GET['phone']) && isset($_GET['text'])) {
    $phone = $_GET['phone'];
    $text = $_GET['text'];
    $whatsappLink = "https://api.whatsapp.com/send?phone=" . urlencode($phone) . "&text=" . urlencode($text);

    // Gera a URL do QR Code com base no link do WhatsApp
    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($whatsappLink) . "&size=300x300";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Link WhatsApp - Conecte-se com Facilidade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-copy {
            background-color: #25D366; /* Cor do WhatsApp */
            color: white;
            font-weight: bold;
        }

        .input-group {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 0.5rem;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .input-group input {
            border: none;
            outline: none;
            padding: 0.5rem;
            width: 100%;
            border-radius: 8px;
            font-size: 1rem;
        }

        .input-group select {
            border: none;
            outline: none;
            padding: 0.5rem;
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-left: 10px;
        }

        .steps {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
        }

        .steps h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .steps ul {
            list-style-type: none;
            padding-left: 0;
        }

        .steps ul li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .steps ul li:before {
            content: '✔️';
            margin-right: 10px;
            color: #25D366; /* Cor do WhatsApp */
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            gap: 2rem;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 700;
        }

        .whatsapp-icon {
            font-size: 2rem;
            color: #25D366;
            margin-right: 10px;
        }

        .btn-copy {
            background-color: #25D366;
            color: white;
            font-weight: bold;
        }

        /* Ajustes para responsividade */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                align-items: center;
            }

            .steps {
                margin-top: 2rem;
            }
        }
    </style>
</head>

<body>

    <!-- Seção de Introdução -->
    <header class="bg-green-500 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="https://media.discordapp.net/attachments/1269376470296428656/1313241060201332746/Design_sem_nome5.png?ex=674f6a8b&is=674e190b&hm=46e2972a33f2b33488adc64f2f42e155878e9853254b7389de08d6d1bc0d6380&=&format=webp&quality=lossless" alt="Logo WhatsApp" height="100px" width="200px">
                
            </div>

            <!-- Navegação -->
            <nav class="hidden md:flex space-x-8 text-lg">
                <a href="/" class="hover:text-gray-200 transition">Home</a>
                
            </nav>

            <!-- Menu de Mobile (hamburger) -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden bg-green-500 text-white space-y-4 py-4 px-6 hidden">
            <a href="/" class="block hover:text-gray-200 transition">Home</a>
           
        </div>
    </header>

    <!-- Seção Principal - Gerador de Link -->
    <section class="py-12">
        <div class="container mx-auto form-container">

            <!-- Descrição sobre o processo -->
            <div class="steps flex-1">
                <h3 class="text-2xl font-bold text-green-600 mb-4">Como Funciona?</h3>
                <p class="text-lg mb-4">Em apenas alguns passos simples, você pode criar um link para o seu WhatsApp, facilitando o contato com seus clientes e amigos. Veja como:</p>

                <ul>
                    <li><span class="whatsapp-icon"> ✅ </span> Digite o número de WhatsApp com o DDD.</li>
                    <li><span class="whatsapp-icon"> ✅ </span> Crie uma mensagem personalizada para enviar automaticamente.</li>
                    <li><span class="whatsapp-icon"> ✅ </span> Clique em "Gerar Link".</li>
                    <li><span class="whatsapp-icon"> ✅ </span> Agora, compartilhe seu link com facilidade!</li>
                </ul>
            </div>

            <!-- Formulário -->
            <section class="py-12">
    <div class="container mx-auto form-container">
        <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 flex-1">
            <h2 class="text-3xl font-bold text-center text-green-500 mb-6">Gerador de Link WhatsApp</h2>

            <form action="" method="GET" class="space-y-4">
                <div class="input-group flex items-center border-b-2 border-gray-300 pb-3 mb-4">
                    <select name="country" id="country" class="flag-icon-select text-sm p-2 w-1/3 rounded-md">
                    <option value="55" class="flag-icon flag-icon-br" selected>Brasil (+55)</option>
    <option value="1" class="flag-icon flag-icon-us">Estados Unidos (+1)</option>
    <option value="44" class="flag-icon flag-icon-gb">Reino Unido (+44)</option>
    <option value="33" class="flag-icon flag-icon-fr">França (+33)</option>
    <option value="49" class="flag-icon flag-icon-de">Alemanha (+49)</option>
    <option value="34" class="flag-icon flag-icon-es">Espanha (+34)</option>
    <option value="61" class="flag-icon flag-icon-au">Austrália (+61)</option>
    <option value="91" class="flag-icon flag-icon-in">Índia (+91)</option>
    <option value="81" class="flag-icon flag-icon-jp">Japão (+81)</option>
    <option value="55" class="flag-icon flag-icon-ca">Canadá (+1)</option>
                    </select>
                    <input type="text" name="phone" placeholder="Digite o número com DDD" class="ml-2 p-2 w-2/3 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="text" class="block text-sm font-medium text-gray-700">Mensagem:</label>
                    <input type="text" id="text" name="text" placeholder="Digite sua mensagem aqui" class="mt-1 block w-full px-4 py-2 border rounded-lg" required>
                </div>
                <button type="submit" class="w-full py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Gerar Link</button>
            </form>

            <?php if ($whatsappLink): ?>
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-center text-green-600">Link para WhatsApp gerado:</h2>
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <input id="whatsappLink" type="text" value="<?= $whatsappLink ?>" class="w-full px-4 py-2 border rounded-lg text-gray-700" readonly>
                    <button id="copyButton" class="mt-4 w-full py-2 btn-copy rounded-lg bg-green-600 text-white hover:bg-green-700">Copiar Link</button>
                </div>
            </div>
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-center text-green-600">QR Code:</h2>
                <div class="text-center">
                    <img src="<?= $qrCodeUrl ?>" alt="QR Code do WhatsApp" class="mx-auto">
                    <a href="<?= $qrCodeUrl ?>" download="qrcode.png" class="mt-4 inline-block bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Baixar QR Code</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

    <!-- Script para o menu responsivo -->
    <script>
        document.getElementById("menu-toggle").onclick = function() {
            var menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        }

        function copyToClipboard() {
            var copyText = document.querySelector("a[href^='https://api.whatsapp.com']");
            var textarea = document.createElement("textarea");
            textarea.value = copyText.textContent;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert("Link copiado para a área de transferência!");
        }
    </script>

</body>

</html>
