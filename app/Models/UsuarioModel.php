<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nome', 'email', 'senha'];

    public function autenticar($usuario, $senha)
    {

        $db = \Config\Database::connect();

        $sql = "SELECT * FROM usuarios WHERE nome = ? AND senha = ? LIMIT 1";

        $query = $this->db->query($sql, [$usuario, $senha]);

        return $query->getRowArray();
    }

    public function editarUsuario($nome, $senha)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT id_usuario FROM usuarios WHERE nome = ?";
        $query = $db->query($sql, [$nome]);
        $result = $query->getRowArray();

        if ($result) {
            $sql = "UPDATE usuarios SET senha = ? WHERE nome = ?";
            return $db->query($sql, [$senha, $nome]);
        }

        return false;
    }
}
