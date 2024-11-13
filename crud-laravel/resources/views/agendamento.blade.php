<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Lista de Agendamentos</h1>

        @if(session('success'))
        <div id="success-alert" class="bg-green-500 text-white p-4 rounded mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-white text-2xl font-bold ml-4 px-2 py-1 rounded">
                &times;
            </button>
        </div>
        @endif

        @if($agendamentos->isEmpty())
        <p class="text-center text-gray-400">Nenhum agendamento encontrado.</p>
        @else
        <table class="min-w-full bg-gray-800 border border-gray-700 text-white">
            <thead>
                <tr>
                    <th class="p-4 text-left">Nome do Cliente</th>
                    <th class="p-4 text-left">Telefone</th>
                    <th class="p-4 text-left">Data e Hora</th>
                    <th class="p-4 text-left">Serviço</th>
                    <th class="p-4 text-left">Funcionário</th>
                    <th class="p-4 text-left">Observações</th>
                    <th class="p-4 text-left">Referências</th>
                    <th class="p-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                <tr>
                    <td class="p-4">
                        @if ($agendamento->cliente)
                        {{ $agendamento->cliente->name }}
                        @else
                        Cliente não encontrado
                        @endif
                    </td>
                    <td class="p-4">{{ $agendamento->telefone_cliente }}</td>
                    <td class="p-4">{{ $agendamento->horario_agendamento->format('d/m/Y H:i') }}</td>
                    <td class="p-4">{{ $agendamento->servico->nome_servico }} - R$ {{ number_format($agendamento->servico->preco, 2, ',', '.') }}</td>
                    <td class="p-4">
                        @if ($agendamento->funcionario)
                        {{ $agendamento->funcionario->nome }}
                        @else
                        Funcionário não atribuído
                        @endif
                    </td>
                    <td class="p-4">{{ $agendamento->observacoes }}</td>
                    <td class="p-4">{{ $agendamento->referencias }}</td>
                    <td class="p-4">
                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="text-yellow-500" onclick="return confirmEdit()">Editar</a> |
                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <script>
        function confirmDelete() {
            var result = confirm("Você tem certeza que deseja excluir este agendamento?");
            if (result) {
                event.target.submit();
            }
            return false;
        }
    </script>
</body>

</html>