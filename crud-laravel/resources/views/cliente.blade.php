<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Lista de Usuários</h1>

        @if(session('success'))
        <div id="success-alert" class="bg-green-500 text-white p-4 rounded mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-white text-2xl font-bold ml-4 px-2 py-1 rounded">
                &times;
            </button>
        </div>
        @endif


        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr>
                    <th class="p-4 text-left">Nome</th>
                    <th class="p-4 text-left">E-mail</th>
                    <th class="p-4 text-left">Senha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr class="border-b border-gray-700">
                    <td class="p-4">{{ $usuario->name }}</td>
                    <td class="p-4">{{ $usuario->email }}</td>
                    <td class="p-4 text-sm">{{ $usuario->password }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>