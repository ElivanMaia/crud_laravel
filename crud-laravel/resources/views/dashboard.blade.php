<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #inicio {
            position: relative;
            min-height: 100vh;
            background-image: url("{{ asset('images/inicio.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 50px;
        }

        @media (max-width: 915px) {
            #inicio {
                background-image: url("{{ asset('images/bannerResp.png') }}");
                background-size: cover;
                background-repeat: no-repeat;
                margin-top: 50px;
                background-position: center;
            }
        }

        #servicos {
            min-height: 100vh;
            background-image: url("{{ asset('images/imagemInicial1.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        #horarios {
            min-height: 100vh;
            background-image: url("{{ asset('images/imagemInicial1.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.6) !important;
            border: none;
        }

        .card-body {
            min-height: 200px;
            /* Ajuste conforme necessário */
        }
    </style>
</head>

<body>

    @section('content')
    @include('layouts.navigation')

    <section id="inicio"></section>


    <section id="equipe" class="pt-4 pb-5 bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="section-title">Equipe</h2>
                    <p class="pb-4" style="font-size: 18px;">Conheça a nossa equipe de profissionais qualificados e experientes.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="images/equipe1.jpg" class="card-img-top" alt="João Silva">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 20px;">João Silva</h5>
                            <p class="card-text" style="font-size: 18px;">Especialista em cortes clássicos e modernos. Muita experiência em barbas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="images/equipe2.jpg" class="card-img-top" alt="Carlos Souza">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 20px;">Carlos Souza</h5>
                            <p class="card-text" style="font-size: 18px;">Barbeiro com experiência em barbas e cortes artísticos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img src="images/equipe3.jpg" class="card-img-top" alt="Ricardo Pereira">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 20px;">Ricardo Pereira</h5>
                            <p class="card-text" style="font-size: 18px;">Expert em tratamentos capilares e estética masculina</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-white text-center mb-5">Nossos Serviços</h2>
        <div class="row">
            @foreach ($servicos as $servico)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-light rounded-lg">
                    <div class="p-4 text-center">
                        @if($servico->imagem)
                            <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do serviço" class="w-full h-48 object-cover rounded mb-3">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Imagem+Indisponível" class="w-full h-48 object-cover rounded mb-3" alt="Imagem Indisponível">
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title font-weight-bold">{{ $servico->nome_servico }}</h5>
                        <p class="card-text">{{ $servico->descricao }}</p>
                        <p class="price h4 text-primary">R$ {{ number_format($servico->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




    <section id="horarios" class="py-5 bg-dark">
        <div class="container pt-5">
            <h2 class="section-title text-center mb-4 py-4 text-white">Datas e Horários de Agendamento</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card h-100 text-center">
                        <div class="card-body d-flex flex-column justify-content-center" style="height: 300px;">
                            <h4 class="card-title" style="font-size: 24px;"><i class="bi bi-calendar-day icon"></i> Dias de Agendamento</h4>
                            <br>
                            <ul class="list-unstyled styled-list">
                                <li style="font-size: 20px;">Terça-feira</li>
                                <li style="font-size: 20px;">Quarta-feira</li>
                                <li style="font-size: 20px;">Quinta-feira</li>
                                <li style="font-size: 20px;">Sexta-feira</li>
                                <li style="font-size: 20px;">Sábado</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 text-center">
                        <div class="card-body d-flex flex-column justify-content-center" style="height: 300px;">
                            <h4 class="card-title" style="font-size: 24px;"><i class="bi bi-clock icon"></i> Horários de Agendamento</h4>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled styled-list">
                                        <li style="font-size: 20px;">08:00</li>
                                        <li style="font-size: 20px;">09:30</li>
                                        <li style="font-size: 20px;">11:00</li>
                                        <li style="font-size: 20px;">13:00</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-unstyled styled-list">
                                        <li style="font-size: 20px;">14:30</li>
                                        <li style="font-size: 20px;">16:00</li>
                                        <li style="font-size: 20px;">17:30</li>
                                        <li style="font-size: 20px;">19:00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="agendamentos" class="vh-100 d-flex justify-content-center align-items-center bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center text-white">Agendar Corte</h2>
                    <form action="{{ route('agendamentos.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="telefone_cliente" class="text-white">Telefone<span style="color: red">*</span></label>
                            <input type="tel" name="telefone_cliente" value="{{ old('telefone_cliente') }}"
                                class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                onkeypress="$(this).mask('(00) 0000-0000')"
                                placeholder="(00) 0000-0000" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="horario_agendamento" class="text-white">Data e Hora<span style="color: red">*</span></label>
                            <input type="datetime-local"
                                id="horario_agendamento"
                                name="horario_agendamento"
                                class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                required>
                            <!-- Exibir erro, caso haja -->
                            @error('horario_agendamento')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_servico" class="text-white">Serviço<span style="color: red">*</span></label>
                            <select name="id_servico" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" required>
                                <option value="" disabled selected hidden>Selecione o serviço desejado</option>
                                @foreach ($servicos as $servico)
                                <option value="{{ $servico->id }}"
                                    {{ old('id_servico') == $servico->id ? 'selected' : '' }}>
                                    {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="observacoes" class="text-white">Especificações</label>
                            <textarea name="observacoes" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                rows="3" placeholder="Digite suas observações aqui">{{ old('observacoes') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="referencias" class="text-white">Como ficou sabendo da barbearia?</label>
                            <input type="text" name="referencias" value="{{ old('referencias') }}"
                                class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                placeholder="Digite sua resposta aqui">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-48 p-2 rounded bg-blue-600 text-white">Agendar</button>
                            <button type="button" id="meuAgendamentoBtn" class="btn btn-secondary w-48 p-2 rounded bg-gray-600 text-white"
                                data-bs-toggle="modal" data-bs-target="#agendamentoModal">
                                Meu agendamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 0000-0000');
        });
    </script>

    <script>
        // Definição dos horários permitidos para cada dia da semana (2=terça, 3=quarta, etc)
        const horariosPermitidos = {
            "2": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"], // Terça-feira
            "3": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"], // Quarta-feira
            "4": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"], // Quinta-feira
            "5": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"], // Sexta-feira
            "6": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"] // Sábado
        };

        // Função para formatar data e hora no formato 'YYYY-MM-DDTHH:MM'
        function formatDate(date) {
            return date.toISOString().slice(0, 16);
        }

        // Função para ajustar a hora do input se estiver inválida
        document.getElementById('horario_agendamento').addEventListener('input', function(e) {
            const input = e.target;
            const selectedDate = new Date(input.value);

            // Obtém o dia da semana (0 = Domingo, 1 = Segunda-feira, 2 = Terça-feira, etc.)
            const dayOfWeek = selectedDate.getDay();

            // Se o dia não for entre terça-feira e sábado, exibe alerta e limpa o campo
            if (dayOfWeek === 0 || dayOfWeek === 1) {
                alert('Somente dias de terça a sábado são permitidos!');
                input.setCustomValidity('Escolha um dia entre terça-feira e sábado.');
                input.value = ''; // Limpa o campo
                return;
            }

            // Obtém o horário do input selecionado
            const selectedHour = selectedDate.getHours();
            const selectedMinute = selectedDate.getMinutes();
            const selectedTime = `${String(selectedHour).padStart(2, '0')}:${String(selectedMinute).padStart(2, '0')}`;

            // Verifica se o horário selecionado é válido para aquele dia
            const validHours = horariosPermitidos[dayOfWeek];

            // Se o horário selecionado não estiver na lista de horários válidos
            if (!validHours.includes(selectedTime)) {
                // Ajusta para o primeiro horário disponível da lista
                const firstValidTime = validHours[0]; // Sempre escolhe o primeiro horário da lista

                // Ajuste da data para o primeiro horário válido
                const [hour, minute] = firstValidTime.split(":");
                selectedDate.setHours(hour, minute);

                // Atualiza o campo de entrada com a data e hora ajustada
                input.value = formatDate(selectedDate);

                // Exibe um alerta para o usuário
                alert(`Horário inválido! Ajustado automaticamente para o primeiro horário disponível: ${firstValidTime}`);
            }
        });

        // Configura a data mínima para o agendamento (não permite datas passadas)
        document.getElementById('horario_agendamento').setAttribute('min', formatDate(new Date()));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>