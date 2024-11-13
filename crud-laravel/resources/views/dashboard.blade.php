<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        }


        .fa-star {
            font-size: 1.5em;
            color: #d3d3d3;
            cursor: pointer;
        }

        .fa-star.checked {
            color: #ffbc00;
        }

        .bg-dark {
        background-color: #f8f9fa !important;
    }

    .section-title {
        font-size: 32px;
        color: #333;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .card {
        border: 1px solid #ddd;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .bi {
        color: #0069d9;
    }

    .list-unstyled li {
        font-size: 18px;
        color: #555;
        padding: 5px 0;
        transition: color 0.3s ease;
    }

    .list-unstyled li:hover {
        color: #0069d9;
        cursor: pointer;
    }

    .card-body {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 300px;
    }
    </style>
</head>

<body>

    @section('content')
    @include('layouts.navigation')

    @if(session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif






    <section id="inicio"></section>


    <section id="equipe" class="pt-4 pb-5 bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="section-title text-white">Nossa Equipe de Funcionários</h2>
                    <p class="pb-4 text-white" style="font-size: 18px;">Conheça os nossos talentosos funcionários que fazem a diferença no nosso atendimento.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($funcionarios as $funcionario)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="p-4 text-center">
                            @if($funcionario->foto)
                            <img src="{{ Storage::url($funcionario->foto) }}" alt="Foto do funcionário" class="card-img-top w-full h-48 object-cover rounded mb-3">
                            @else
                            <img src="https://via.placeholder.com/600x400?text=Foto+Indisponível" class="card-img-top w-full h-48 object-cover rounded mb-3" alt="Foto Indisponível">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 20px;">{{ $funcionario->nome }}</h5>
                            <p class="card-text" style="font-size: 18px;">{{ $funcionario->frase_pessoal ?? 'Sem frase pessoal' }}</p>
                            <p class="text-muted" style="font-size: 16px;">{{ $funcionario->caminho_barbearia }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
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
        <h2 class="section-title text-center mb-5 text-white" style="font-size: 32px; font-weight: bold;">Datas e Horários de Agendamento</h2>
        <div class="row">
            <!-- Cartão de Dias de Agendamento -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-light rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-center" style="height: 300px; text-align: center;">
                        <h4 class="card-title text-dark mb-4" style="font-size: 24px; font-weight: 600;">
                            <i class="bi bi-calendar-day" style="font-size: 28px; color: #0069d9;"></i> Dias de Agendamento
                        </h4>
                        <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                            <li>Terça-feira</li>
                            <li>Quarta-feira</li>
                            <li>Quinta-feira</li>
                            <li>Sexta-feira</li>
                            <li>Sábado</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cartão de Horários de Agendamento -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-light rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-center" style="height: 300px; text-align: center;">
                        <h4 class="card-title text-dark mb-4" style="font-size: 24px; font-weight: 600;">
                            <i class="bi bi-clock" style="font-size: 28px; color: #0069d9;"></i> Horários de Agendamento
                        </h4>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                                    <li>08:00</li>
                                    <li>09:30</li>
                                    <li>11:00</li>
                                    <li>13:00</li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                                    <li>14:30</li>
                                    <li>16:00</li>
                                    <li>17:30</li>
                                    <li>19:00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <section id="agendamentos" class="d-flex justify-content-center align-items-center bg-dark" style="min-height: 100vh; position: relative;">
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
                            @error('horario_agendamento')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_servico" class="text-white">Serviço<span style="color: red">*</span></label>
                            <select name="id_servico" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" required>
                                <option value="" disabled selected hidden>Selecione o serviço desejado</option>
                                @foreach ($servicos as $servico)
                                <option value="{{ $servico->id }}" {{
                                old('id_servico') == $servico->id ? 'selected' : '' }}>
                                    {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_funcionario" class="text-white">Escolha o Funcionário<span style="color: red">*</span></label>
                            <select name="id_funcionario" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" required>
                                <option value="" disabled selected hidden>Selecione o Funcionário</option>
                                @foreach ($funcionarios as $funcionario)
                                <option value="{{ $funcionario->id }}" {{
                                old('id_funcionario') == $funcionario->id ? 'selected' : '' }}>
                                    {{ $funcionario->nome }}
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
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#agendamentoModal">
                                Ver Agendamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="agendamentoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendamentoModalLabel">Detalhes do Agendamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(isset($agendamento))
    <p><strong>Detalhes do Agendamento:</strong> {{ $agendamento->id ?? 'Não encontrado' }}</p>
    <p><strong>Cliente:</strong> {{ $agendamento->cliente->nome ?? 'Não informado' }}</p>
    <p><strong>Telefone:</strong> {{ $agendamento->cliente->telefone ?? 'Não informado' }}</p>
    <p><strong>Data e Hora:</strong> {{ $agendamento->horario_agendamento->format('d/m/Y H:i') ?? 'Não informado' }}</p>
    <p><strong>Serviço:</strong> {{ $agendamento->servico->nome_servico ?? 'Não informado' }} - R$ {{ number_format($agendamento->servico->preco ?? 0, 2, ',', '.') }}</p>
    <p><strong>Funcionário:</strong> {{ $agendamento->funcionario->nome ?? 'Não informado' }}</p>
    <p><strong>Observações:</strong> {{ $agendamento->observacoes ?? 'Não informado' }}</p>
    <p><strong>Referências:</strong> {{ $agendamento->referencias ?? 'Não informado' }}</p>
@else
    <p>Agendamento não encontrado.</p>
@endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>



    <section id="feedbacks" class="py-5 bg-dark">
        <div class="container">
            <h2 class="section-title text-center mb-5 text-white">Deixe seu Feedback</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('feedbacks.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="avaliacao" class="text-white">Avaliação <span class="text-red-500">*</span></label>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star" data-index="{{ $i }}"></span>
                                    @endfor
                            </div>
                            <input type="hidden" name="avaliacao" id="avaliacao" value="0" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="mensagem" class="text-white">Mensagem <span class="text-red-500">*</span></label>
                            <textarea name="mensagem" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" rows="5" placeholder="Deixe sua mensagem" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sugestoes" class="text-white">Sugestões</label>
                            <textarea name="sugestoes" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" rows="3" placeholder="Deixe suas sugestões"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-48 p-2 rounded bg-blue-600 text-white">Enviar Feedback</button>
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
        const stars = document.querySelectorAll('.fa-star');
        const ratingInput = document.getElementById('avaliacao');

        stars.forEach(star => {
            star.addEventListener('mouseover', function() {
                const index = parseInt(star.getAttribute('data-index'));
                highlightStars(index);
            });

            star.addEventListener('mouseout', function() {
                const currentRating = parseInt(ratingInput.value);
                highlightStars(currentRating);
            });

            star.addEventListener('click', function() {
                const index = parseInt(star.getAttribute('data-index'));
                ratingInput.value = index;
                highlightStars(index);
            });
        });

        function highlightStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('checked');
                } else {
                    star.classList.remove('checked');
                }
            });
        }
    </script>

    <script>
        var agendamentoModal = document.getElementById('agendamentoModal');
        agendamentoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var cliente = button.getAttribute('data-cliente');
            var telefone = button.getAttribute('data-telefone');
            var data = button.getAttribute('data-data');
            var servico = button.getAttribute('data-servico');
            var funcionario = button.getAttribute('data-funcionario');
            var observacoes = button.getAttribute('data-observacoes');
            var referencias = button.getAttribute('data-referencias');

            var modalTitle = agendamentoModal.querySelector('.modal-title');
            var modalBody = agendamentoModal.querySelector('.modal-body');

            modalTitle.textContent = 'Detalhes do Agendamento - ' + cliente;
            modalBody.innerHTML = `
            <p><strong>Cliente:</strong> ${cliente}</p>
            <p><strong>Telefone:</strong> ${telefone}</p>
            <p><strong>Data e Hora:</strong> ${data}</p>
            <p><strong>Serviço:</strong> ${servico}</p>
            <p><strong>Funcionário:</strong> ${funcionario}</p>
            <p><strong>Observações:</strong> ${observacoes}</p>
            <p><strong>Referências:</strong> ${referencias}</p>
        `;
        });
    </script>



    <script>
        const horariosPermitidos = {
            "2": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "3": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "4": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "5": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "6": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"]
        };

        function formatDate(date) {
            return date.toISOString().slice(0, 16);
        }

        document.getElementById('horario_agendamento').addEventListener('input', function(e) {
            const input = e.target;
            const selectedDate = new Date(input.value);

            const dayOfWeek = selectedDate.getDay();

            if (dayOfWeek === 0 || dayOfWeek === 1) {
                alert('Somente dias de terça a sábado são permitidos!');
                input.setCustomValidity('Escolha um dia entre terça-feira e sábado.');
                input.value = '';
                return;
            }

            const selectedHour = selectedDate.getHours();
            const selectedMinute = selectedDate.getMinutes();
            const selectedTime = `${String(selectedHour).padStart(2, '0')}:${String(selectedMinute).padStart(2, '0')}`;

            const validHours = horariosPermitidos[dayOfWeek];

            if (!validHours.includes(selectedTime)) {
                const firstValidTime = validHours[0];

                const [hour, minute] = firstValidTime.split(":");
                selectedDate.setHours(hour, minute);

                input.value = formatDate(selectedDate);

                alert(`Horário inválido! Ajustado automaticamente para o primeiro horário disponível: ${firstValidTime}`);
            }
        });

        document.getElementById('horario_agendamento').setAttribute('min', formatDate(new Date()));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

</body>

</html>