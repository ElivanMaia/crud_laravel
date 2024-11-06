<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <section id="servicos" class="py-5 bg-dark">
        <div class="container pt-5">
            <h1 class="section-title text-center mb-4 py-4 text-white">Nossos Serviços</h1>
            <div id="carouselServicos" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/cabeloMasc.jpg" class="card-img-top" alt="Corte de Cabelo">
                                    <div class="card-body">
                                        <h4 class="card-title">Corte de Cabelo</h4>
                                        <p class="card-text">R$30.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/cabeloBarba.jpg" class="card-img-top" alt="Corte de Cabelo + Barba">
                                    <div class="card-body">
                                        <h4 class="card-title">Corte de Cabelo + Barba</h4>
                                        <p class="card-text">R$40.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/barboterapia.jpg" class="card-img-top" alt="Barboterapia">
                                    <div class="card-body">
                                        <h4 class="card-title">Barboterapia</h4>
                                        <p class="card-text">R$25.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/pigmentBarba.jpg" class="card-img-top" alt="Pigmentação de Barba">
                                    <div class="card-body">
                                        <h4 class="card-title">Pigmentação de Barba</h4>
                                        <p class="card-text">R$35.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/relaxCapilar.jpg" class="card-img-top" alt="Relaxamento Capilar">
                                    <div class="card-body">
                                        <h4 class="card-title">Relaxamento Capilar</h4>
                                        <p class="card-text">R$40.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/progressiva.jpg" class="card-img-top" alt="Progressiva">
                                    <div class="card-body">
                                        <h4 class="card-title">Progressiva</h4>
                                        <p class="card-text">R$50.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/designSobran.jpg" class="card-img-top" alt="Design de Sobrancelhas">
                                    <div class="card-body">
                                        <h4 class="card-title">Design de Sobrancelhas</h4>
                                        <p class="card-text">R$15.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/limpezaMasc.jpg" class="card-img-top" alt="Limpeza de Pele">
                                    <div class="card-body">
                                        <h4 class="card-title">Limpeza de Pele</h4>
                                        <p class="card-text">R$30.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="images/hidratacao.jpg" class="card-img-top" alt="Hidratação">
                                    <div class="card-body">
                                        <h4 class="card-title">Hidratação</h4>
                                        <p class="card-text">R$30.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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
                    <form method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="telefone" class="text-white">Telefone<span style="color: red">*</span></label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" onkeypress="$(this).mask('(00) 0000-0000')" placeholder="(00) 0000-0000" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="data" class="text-white">Data e Hora<span style="color: red">*</span></label>
                            <input type="datetime-local" class="form-control" id="data" name="data" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="service" class="text-white">Serviço<span style="color: red">*</span></label>
                            <select class="form-control" id="service" name="service" required>
                                <option value="" disabled selected hidden>Selecione o serviço desejado</option>
                                <option value="1">Corte de Cabelo Masculino</option>
                                <option value="2">Corte de Cabelo + Barba</option>
                                <option value="3">Barboterapia</option>
                                <option value="4">Pigmentação de Barba</option>
                                <option value="5">Relaxamento Capilar</option>
                                <option value="6">Progressiva</option>
                                <option value="7">Design de Sobrancelhas</option>
                                <option value="8">Limpeza de Pele Masculina</option>
                                <option value="9">Hidratação</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="observacao" class="text-white">Especificações</label>
                            <textarea class="form-control" id="observacao" name="observacao" placeholder="Digite suas observações aqui" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="referencia" class="text-white">Como ficou sabendo da barbearia?</label>
                            <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Digite sua resposta aqui">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Agendar</button>
                        <button type="button" id="meuAgendamentoBtn" class="btn btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#agendamentoModal">Meu agendamento</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>