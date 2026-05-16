<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/historico.css') ?>" />
</head>

<body>
    <header>
        <div class="h_esquerda">
            <div>
                <img class="logo" src="./public/logo_laranja.png">
            </div>
            <div class="text">
                <h1>SecureGate Industrial</h1>
                <p>Controle de Visitantes</p>
            </div>
        </div>

        <div class="h_direita">
            <div>
                <h1>Portaria Principal</h1>
                <p class="user-name"><?= $nome ?></p>
            </div>
            <form action="<?= base_url('index') ?>" method="post">
                <button class="btn-sair" type="submit">Sair</button>
            </form>
        </div>

    </header>

    <div class="laranja"></div>

    <main>
        <div class="esquerda">
            <div class="buttons">
                <form action="<?= base_url('dashboard') ?>" method="post">
                    <button>
                        <h1>Dashboard</h1>
                    </button>
                </form>
                <form action="<?= base_url('registrar') ?>" method="post">
                    <button>
                        <h1>Registar <br> Entrada</h1>
                    </button>
                </form>
                <form action="<?= base_url('visitantes') ?>" method="post">
                    <button>
                        <h1>Visitantes</h1>
                    </button>
                </form>

                <button class="selected">
                    <h1>Histórico</h1>
                </button>

            </div>
        </div>

        <div class="direita">
            <div class="container">

                <div class="topo">
                    <h1>Histórico de Acessos</h1>
                    <p>Consulte todos os acessos registrados</p>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Visitante</th>
                            <th>CPF</th>
                            <th>Área</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Duração</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($historico as $h): ?>
                            <tr>
                                <td><?= $h['nome'] ?></td>
                                <td><?= $h['cpf'] ?></td>
                                <td><?= $h['area'] ?></td>

                                <td><?= date('d/m H:i', strtotime($h['hora_entrada'])) ?></td>
                                <td><?= date('d/m H:i', strtotime($h['hora_saida'])) ?></td>

                                <td>
                                    <?php
                                    $horas = floor($h['duracao_minutos'] / 60);
                                    $min = $h['duracao_minutos'] % 60;
                                    echo "{$horas}h {$min}min";
                                    ?>
                                </td>

                                <td><span class="status status-<?= $h['status'] ?>"><?= strtoupper($h['status']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>