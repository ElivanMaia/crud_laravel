<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="agendamentoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="agendamentoModalLabel">Meu Agendamento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if (!empty($agendamentos)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Horário</th>
                                                <th>Serviço</th>
                                                <th>Observações</th>
                                                <th>Referência</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($agendamentos as $agendamento) : ?>
                                                <tr>
                                                    <td><?php echo $agendamento['nome_usuario']; ?></td>
                                                    <td><?php echo $agendamento['horario_agendamento']; ?></td>
                                                    <td><?php echo $agendamento['nome_corte']; ?></td>
                                                    <td><?php echo $agendamento['observacoes']; ?></td>
                                                    <td><?php echo $agendamento['referencia']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <p class="text-center text-dark">Nenhum agendamento encontrado.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>