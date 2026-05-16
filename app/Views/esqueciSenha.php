<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('public/css/login_usuario.css') ?>" />

</head>

<body>
    <div class="container">
        <div class="container1">
            <form action="<?= base_url('atualizarUsuario') ?>" class="login" method="post">
                <div class="logo">
                    <div class="imgLogo">
                        <img src="./public/logo.jpeg" />
                    </div>
                </div>
                <div class="titulos">
                    <p class="titulo">Redefinir Senha</p>
                    <p class="subTitulo">Insira seu usuário e sua nova senha</p>
                </div>
                <div class="usuario">
                    <label>Usuário</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu usuário">
                    <label>Nova Senha</label>
                    <input type="text" name="senha" id="senha" placeholder="Digite sua nova senha">
                    <div class="btn">
                        <button>Salvar</button>
                    </div>
                    <div class="esqueciSenha">
                        <a href="<?= base_url('index') ?>">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="copyright">
            <p>© 2026 SecureGate Industrial</p>
        </div>
    </div>
</body>

</html>