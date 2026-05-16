<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/dashboard.css') ?>" />
</head>

<body class="dashboard">
    <header>
        <div class="h_esquerda">
            <div>
                <img class="logo" src="<?= base_url('public/logo_laranja.png') ?>">
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

                <button class="selected">
                    <h1>Dashboard</h1>
                </button>

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
                <form action="<?= base_url('historico') ?>" method="post">
                    <button>
                        <h1>Histórico</h1>
                    </button>
                </form>
            </div>
        </div>

        <div class="direita">

            <div class="superior">
                <div class="s_esquerda">
                    <div>
                        <h1>Dashboard</h1>
                    </div>
                    <div>
                        <p>Visitantes ativos no momento</p>
                    </div>
                </div>
                <div class="s_direita">
                    <div>Data</div>
                    <div class="data">
                        <?php
                        date_default_timezone_set('America/Sao_Paulo');
                        $dataAtual = date('d/m/Y');
                        echo $dataAtual;
                        ?>
                    </div>
                </div>
            </div>

            <div class="mainCards">
                <div class="card">
                    <img class="ativo" src="<?= base_url('public/css/imagens_dashboard/ativo.jpeg') ?>">
                    <h4>Visitantes Ativos</h4>
                    <h1><?= $stats['ativos'] ?></h1>
                    <p>Dentro da empresa</p>
                </div>
                <div class="card">
                    <img class="cadastrados" src="<?= base_url('public/css/imagens_dashboard/cadastrados.jpeg') ?>">
                    <h4>Total Cadastrados</h4>
                    <h1><?= $stats['total'] ?></h1>
                    <p>Visitantes no sistema</p>
                </div>
                <div class="card">
                    <img class="entradas" src="<?= base_url('public/css/imagens_dashboard/entradas.jpeg') ?>">
                    <h4>Entradas Hoje</h4>
                    <h1><?= $stats['hoje'] ?></h1>
                    <p>Entradas hoje</p>
                </div>
            </div>

            <div class="table_div">
                <h1>Visitantes Ativos</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Área</th>
                            <th>Entrada</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <tbody>
                        <?php foreach ($registros as $r): ?>
                            <tr>
                                <td><?= $r['nome'] ?></td>
                                <td><?= $r['email'] ?></td>
                                <td><?= $r['cpf'] ?></td>
                                <td><?= $r['area'] ?></td>
                                <td><?= $r['hora_entrada'] ?></td>
                                <td><span class="status status-<?= $r['status'] ?>"><?= strtoupper($r['status']) ?></span></td>
                                <td><a href="<?= base_url('confirmarSaida?cpf=' . $r['cpf']) ?>" class="btn btn-danger btn-sm">Finalizar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>

</html>