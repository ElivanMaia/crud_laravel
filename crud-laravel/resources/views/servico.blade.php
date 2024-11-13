<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Lista de Serviços</h1>

        @if(session('success'))
        <div id="success-alert" class="bg-green-500 text-white p-4 rounded mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-white text-2xl font-bold ml-4 px-2 py-1 rounded">
                &times;
            </button>
        </div>
        @endif

        <a href="{{ route('servicos.create') }}" class="btn bg-blue-600 text-white px-6 py-2 rounded mb-4 inline-block">
            Adicionar Serviço
        </a>

        @if($servicos->isNotEmpty())
        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr>
                    <th class="p-4 text-left">Imagem</th>
                    <th class="p-4 text-left">Nome do Serviço</th>
                    <th class="p-4 text-left">Preço</th>
                    <th class="p-4 text-left">Descrição</th>
                    <th class="p-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                <tr class="border-b border-gray-700">
                    <td class="p-4">
                        @if($servico->imagem)
                        <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do serviço" class="w-16 h-16 object-cover rounded">
                        @else
                        <span class="text-gray-500">Sem imagem</span>
                        @endif
                    </td>
                    <td class="p-4">{{ $servico->nome_servico }}</td>
                    <td class="p-4">R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                    <td class="p-4 text-sm">{{ $servico->descricao }}</td>
                    <td class="p-4">
                        <a href="{{ route('servicos.edit', $servico->id) }}" class="text-yellow-500">Editar</a> |
                        <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center text-gray-400">Nenhum serviço cadastrado.</p>
        @endif
    </div>

    <script>
        function confirmDelete() {
            var result = confirm("Você tem certeza que deseja excluir este serviço?");
            if (result) {
                event.target.submit();
            }
            return false;
        }
    </script>
</body>

</html>
