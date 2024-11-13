<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedbacks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Lista de Feedbacks</h1>

        @if(session('success'))
        <div id="success-alert" class="bg-green-500 text-white p-4 rounded mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-white text-2xl font-bold ml-4 px-2 py-1 rounded">
                &times;
            </button>
        </div>
        @endif

        @if($feedbacks->isNotEmpty())
        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr>
                    <th class="p-4 text-left">Avaliação</th>
                    <th class="p-4 text-left">Mensagem</th>
                    <th class="p-4 text-left">Sugestões</th>
                    <th class="p-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr class="border-b border-gray-700">
                    <td class="p-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="fa fa-star {{ $i <= $feedback->avaliacao ? 'text-yellow-500' : 'text-gray-500' }}"></span>
                        @endfor
                    </td>
                    <td class="p-4 text-sm">{{ $feedback->mensagem }}</td>
                    <td class="p-4 text-sm">{{ $feedback->sugestoes ?? 'Sem sugestões' }}</td>
                    <td class="p-4">
                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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
        <p class="text-center text-gray-400">Nenhum feedback cadastrado.</p>
        @endif
    </div>

    <script>
        function confirmDelete() {
            var result = confirm("Você tem certeza que deseja excluir este feedback?");
            if (result) {
                event.target.submit();
            }
            return false;
        }
    </script>
</body>

</html>
