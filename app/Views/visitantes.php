<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitantes</title>
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/visitantes.css') ?>" />
</head>

<body class="visitantes">
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

                <button class="selected">
                    <h1>Visitantes</h1>
                </button>

                <form action="<?= base_url('historico') ?>" method="post">
                    <button>
                        <h1>Histórico</h1>
                    </button>
                </form>
            </div>
        </div>

        <div class="direita">
            <div class="container">

                <div class="topo">
                    <div>
                        <h1>Visitantes Cadastrados</h1>
                        <p>Gerencie os visitantes</p>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($visitantes as $v): ?>
                            <tr>
                                <td><?= $v['nome'] ?></td>
                                <td><?= $v['cpf'] ?></td>
                                <td><?= $v['telefone'] ?></td>
                                <td><?= $v['email'] ?></td>
                                <td class="editar"><a href="<?= base_url('editarVisitante/' . $v['id_visitante']) ?>" class="btn btn-outline-primary">Editar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>

    <script src="<?= base_url('public/js/bootstrap.js') ?>"></script>
</body>

</html>