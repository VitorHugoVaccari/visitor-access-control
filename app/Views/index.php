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
            <form action="<?= base_url('home/autenticar') ?>" class="login" method="post">
                <div class="logo">
                    <div class="imgLogo">
                        <img src="./public/logo.jpeg" />
                    </div>
                </div>
                <div class="titulos">
                    <p class="titulo">SecureGate Industrial</p>
                    <p class="subTitulo">Controle de Visitantes Técnicos</p>
                </div>
                <div class="usuario">
                    <label>Usuário</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu usuário">
                    <label>Senha</label>
                    <input type="text" name="senha" id="senha" placeholder="Digite sua senha">
                    <div class="btn">
                        <button>Entrar</button>
                    </div>
                    <div class="esqueciSenha">
                        <a href="<?= base_url('esqueciSenha') ?>">Esqueci minha senha</a>
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