<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Visitante</title>

    <link rel="stylesheet" href="<?= base_url('public/css/editarVisitante.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
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
                        <h1>Editar Visitante</h1>
                        <p>Atualize os dados do visitante</p>
                    </div>
                </div>

                <div class="registro-box">
                    <form action="<?= base_url('atualizarVisitante') ?>" method="post" class="registro-form">
                        <input type="hidden" name="id_visitante" value="<?= $visitante['id_visitante'] ?>">
                        <div class="field">
                            <label for="nomeCompleto">Nome Completo</label>
                            <input type="text" id="nomeCompleto" name="nome" placeholder="Nome Completo" value="<?= $visitante['nome'] ?>">
                        </div>

                        <div class="field">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" id="cpf" placeholder="000.000.00-00" value="<?= $visitante['cpf'] ?>">
                        </div>

                        <div class="field">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" id="telefone" placeholder="(00) 00000-0000" value="<?= $visitante['telefone'] ?>">
                        </div>

                        <div class="field full-width">
                            <label for="email">Email</label>
                            <input type="email" id="Email" name="email" placeholder="Digite seu Email" value="<?= $visitante['email'] ?>">
                        </div>

                        <div class="form-actions">
                            <button type="submit">Salvar</button>
                            <a href="<?= base_url('visitantes') ?>">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="<?= base_url('public/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('public/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('public/js/jquery.mask.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#telefone').mask('(00) 00000-0000')
        });
    </script>
</body>

</html>