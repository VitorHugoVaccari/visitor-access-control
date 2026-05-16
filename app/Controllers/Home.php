<?php

namespace App\Controllers;

use App\Models\AcessoModel;
use App\Models\VisitanteModel;
use App\Models\UsuarioModel;

class Home extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index(): string
    {
        $this->session->destroy();
        return view('index');
    }

    public function esqueciSenha()
    {
        return view('esqueciSenha');
    }

    public function autenticar()
    {

        $model = new UsuarioModel();

        $usuario = $this->request->getPost('nome');
        $senha = $this->request->getPost('senha');

        $usuario = $model->autenticar($usuario, $senha);

        if ($usuario) {
            $this->session->set('nome', $usuario['nome']);

            return redirect()->to(base_url('dashboard'));
        } else {
            return redirect()->to(base_url('erro'));
        }
    }

    public function registrar(): string
    {
        $dados['registro'] = null;
        $dados['nome'] = $this->session->nome;

        return view('registrar', $dados);
    }

    public function registrarEntrada()
    {
        $visitanteModel = new VisitanteModel();
        $acessoModel = new AcessoModel();
        $data['nome'] = $this->session->nome;

        $nome = $this->request->getPost('nome');
        $cpf = $this->request->getPost('cpf');
        $telefone = $this->request->getPost('telefone');
        $email = $this->request->getPost('email');
        $area = $this->request->getPost('area');

        $id_usuario = 1;

        $visitante_id = $visitanteModel->buscarOuCriar(
            $nome,
            $cpf,
            $telefone,
            $email
        );

        $acesso_id = $acessoModel->criarAcesso(
            $visitante_id,
            $area,
            $id_usuario
        );

        if (!$acesso_id) {
            return "<script>alert('Visitante já possui um acesso ativo.'); window.location.href = '" . base_url('dashboard') . "';</script>";
        }

        return redirect()->to('/dashboard');
    }

    public function registrarSaida()
    {
        $cpf = $this->request->getPost('busca');

        $acessoModel = new AcessoModel();
        $data['nome'] = $this->session->nome;

        $acesso = $acessoModel->buscarAtivoPorCpf($cpf);

        if ($acesso) {
            $acessoModel->finalizarSaida($acesso['id_acesso']);
        }

        return redirect()->to('/dashboard');
    }

    public function visitantes(): string
    {
        $visitanteModel = new VisitanteModel();
        $data['visitantes'] = $visitanteModel->buscarTodosVisitantes();
        $data['nome'] = $this->session->nome;
        return view('visitantes', $data);
    }

    public function historico(): string
    {
        $acessoModel = new AcessoModel();

        $data['historico'] = $acessoModel->buscarHistorico();
        $data['nome'] = $this->session->nome;

        return view('historico', $data);
    }

    public function dashboard()
    {
        $acessoModel = new AcessoModel();

        $data['nome'] = $this->session->nome;

        $data['registros'] = $acessoModel->buscarAcessosAtivos();
        $data['stats'] = $acessoModel->getDashboardStats();

        return view('dashboard', $data);
    }

    public function editarVisitante($id)
    {
        $model = new VisitanteModel();

        $dados['visitante'] = $model->buscarVisitantePorId($id);
        $dados['nome'] = $this->session->nome;

        return view('editarVisitante', $dados);
    }

    public function atualizarVisitante()
    {
        $model = new VisitanteModel();

        $id       = $this->request->getPost('id_visitante');
        $nome     = $this->request->getPost('nome');
        $cpf      = $this->request->getPost('cpf');
        $telefone = $this->request->getPost('telefone');
        $email    = $this->request->getPost('email');

        if ($model->editarVisitante($id, $nome, $cpf, $telefone, $email)) {
            $visitanteModel = new VisitanteModel();
            $data['visitantes'] = $visitanteModel->buscarTodosVisitantes();
            $data['nome'] = $this->session->nome;
            return view('visitantes', $data);
        }
    }

    public function atualizarUsuario()
    {
        $model = new UsuarioModel();

        $nome = $this->request->getPost('nome');
        $senha = $this->request->getPost('senha');

        if ($model->editarUsuario($nome, $senha)) {
            return view('index');
        }

        return "<script>alert('Usuario não existe.'); window.location.href = '" . base_url('esqueciSenha') . "';</script>";
    }

    public function confirmarSaida(): string
    {
        $cpf = $this->request->getGet('cpf');
        $data['cpf'] = $cpf;
        $data['nome'] = $this->session->nome;
        return view('confirmarSaida', $data);
    }

    public function erro(): string
    {
        return view('erro');
    }
}
