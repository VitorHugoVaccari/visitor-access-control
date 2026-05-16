<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Saída</title>
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/registro.css') ?>" />
</head>

<body>
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
                <form action="<?= base_url('home/registrarSaida') ?>" method="post">
                    <button>
                        <h1>Dashboard</h1>
                    </button>
                </form>

                <button class="selected">
                    <h1>Registar <br> Entrada</h1>
                </button>

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
            <div class="container">
                <div class="topo">
                    <div>
                        <h1>Confirmar Saída</h1>
                        <p>Digite o CPF do visitante para confirmar a saída</p>
                    </div>
                </div>

                <div class="registro-box">
                    <div class="registro-form">
                        <h2>Confirmar Saída</h2>
                        <form action="<?= base_url('registrarSaida') ?>" method="post">
                            <div class="field full-width">
                                <label for="cpf">CPF</label>
                                <input type="text" id="cpf" name="busca" placeholder="000.000.000-00" value="<?= $cpf ?? '' ?>" required>
                            </div>

                            <div class="form-actions">
                                <button type="submit">Confirmar Saída</button>
                                <a href="<?= base_url('dashboard') ?>" class="cancel-button">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?= base_url('public/js/bootstrap.js') ?>"></script>
</body>

</html>