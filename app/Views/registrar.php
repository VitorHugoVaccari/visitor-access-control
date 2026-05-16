<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/css/registro.css') ?>" />
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
                <div class="titulos">
                    <h1 class="titulo">Registro de Entrada</h1>
                    <p class="subTitulo">Registre entrada de visitantes</p>
                </div>

                <div class="registro-box">
                    <div id="form-entrada" class="registro-form">
                        <h2>Dados da Entrada</h2>
                        <form action="<?= base_url('home/registrarEntrada') ?>" method="post">
                            <div class="field">
                                <label>Nome Completo *</label>
                                <input type="text" name="nome" placeholder="Digite o nome" />
                            </div>

                            <div class="field">
                                <label>CPF *</label>
                                <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" />
                            </div>

                            <div class="field">
                                <label>Telefone *</label>
                                <input type="text" name="telefone" id="telefone" placeholder="(00) 00000-0000" />
                            </div>

                            <div class="field">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Digite seu Email" />
                            </div>

                            <div class="field full-width">
                                <label>Área de Destino *</label>
                                <input type="text" name="area" placeholder="Digite a área de destino" />
                            </div>

                            <div class="form-actions full-width">
                                <button type="submit">Registrar Entrada</button>
                                <button type="reset">Limpar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


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