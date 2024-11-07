<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>
</head>
<body class="bg-gray-900 text-white">
<div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Editar Agendamento</h1>
        
        <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="telefone_cliente" class="block text-lg">Telefone</label>
                <input type="text" id="telefone_cliente" name="telefone_cliente" value="{{ old('telefone_cliente', $agendamento->telefone_cliente) }}" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
            </div>

            <div class="mb-4">
                <label for="horario_agendamento" class="block text-lg">Data e Hora</label>
                <input type="datetime-local" id="horario_agendamento" name="horario_agendamento" value="{{ old('horario_agendamento', $agendamento->horario_agendamento->format('Y-m-d\TH:i')) }}" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
            </div>

            <div class="mb-4">
                <label for="observacoes" class="block text-lg">Observações</label>
                <textarea id="observacoes" name="observacoes" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" rows="4">{{ old('observacoes', $agendamento->observacoes) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="referencias" class="block text-lg">Referências</label>
                <textarea id="referencias" name="referencias" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" rows="4">{{ old('referencias', $agendamento->referencias) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="id_servico" class="block text-lg">Serviço</label>
                <select id="id_servico" name="id_servico" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
                    @foreach($servicos as $servico)
                        <option value="{{ $servico->id }}" {{ old('id_servico', $agendamento->id_servico) == $servico->id ? 'selected' : '' }}>
                            {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded text-white">Atualizar</button>
            </div>
        </form>
    </div>

    <script>
        var telefoneInput = document.getElementById('telefone_cliente');
        var telefoneMask = new Inputmask('(99) 9999-9999');
        telefoneMask.mask(telefoneInput);
    </script>
</body>
</html>
