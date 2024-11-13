<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        #menuButton {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 50;
            transition: transform 0.3s ease;
        }

        #menuButton.open {
            transform: translateX(16rem);
        }

        .custom-card {
            border-radius: 8px;
            border: 1px solid #444;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-gray-900 text-white">

    <header class="bg-gray-800 p-4 shadow-lg flex justify-between items-center">
        <h1 class="text-xl font-bold mx-auto">Admin Dashboard</h1>
        <div class="flex items-center space-x-4">
            <span class="text-gray-400 hidden sm:block">Admin</span>
            <button class="bg-gray-700 p-2 rounded hover:bg-gray-600">Sair</button>
        </div>
    </header>

    <button id="menuButton" class="text-gray-300 focus:outline-none mt-2">
        <svg id="menuIcon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div id="overlay" class="overlay"></div>

    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-800 p-4 transform -translate-x-full transition-transform duration-200 ease-in-out z-40">
        <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
        <nav class="space-y-4">
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">...</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">...</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">...</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">...</a>
        </nav>
    </div>

    <div class="ml-0 transition-margin duration-200 ease-in-out" id="mainContent">
        <main class="p-6">
            <div class="bg-gray-700 rounded p-4 mb-4 shadow-lg">
                <h2 class="text-lg font-semibold mb-2">Visão Geral</h2>
                <p class="text-gray-300">Aqui ficará alguma coisa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Clientes
                    </div>
                    <p class="text-white mb-4">Total de Clientes: {{ $total_clientes }}</p>
                    <a href="{{ route('usuarios.index') }}" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Lista de Clientes</a>
                </div>

                <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Agendamentos
                    </div>
                    <p class="text-white mb-4">Número de Agendamentos: {{ $total_agendamentos }}</p>
                    <a href="{{ route('agendamentos.index') }}" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Agendamentos</a>
                </div>

                <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Funcionários
                    </div>
                    <p class="text-white mb-4">Total de Funcionários: {{ $total_funcionarios }}</p>
                    <a href="{{ route('funcionarios.index') }}" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Lista de Funcionários</a>
                </div>

                <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Serviços
                    </div>
                    <p class=" text-white mb-4">Total de Serviços: {{ $total_servicos }} </p>
                    <a href="{{ route('servicos.index') }}" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Lista Serviços</a>
                </div>

                <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Feedbacks
                    </div>
                    <p class="text-white mb-4">Total de Feedbacks: {{ $total_feedbacks }}</p>
                    <a href="{{ route('feedbacks.index') }}" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Lista Feedbacks</a>
                </div>

                <div class="col bg-gray-700 rounded-lg shadow-lg p-4">
                    <div class="text-white text-lg font-semibold mb-2">
                        Card 3
                    </div>
                    <p class="text-2xl font-bold text-white mb-4">32</p>
                    <a href="#" class="btn bg-gray-800 text-white px-4 py-2 rounded-lg">Ver Mais</a>
                </div>


            </div>


        </main>
    </div>

    <script>
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('mainContent');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('active');

            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');

            if (!sidebar.classList.contains('-translate-x-full')) {
                mainContent.classList.add('ml-64');
                menuButton.classList.add('open');
            } else {
                mainContent.classList.remove('ml-64');
                menuButton.classList.remove('open');
            }
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('active');
            mainContent.classList.remove('ml-64');

            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            menuButton.classList.remove('open');
        });
    </script>

</body>

</html>