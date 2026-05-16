<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitanteModel extends Model
{
    protected $table = 'visitantes';
    protected $primaryKey = 'id_visitante';
    protected $allowedFields = ['nome', 'cpf', 'telefone', 'email'];

    public function buscarTodosVisitantes()
    {
        $db = \Config\Database::connect();

        $sql = "SELECT id_visitante, nome, cpf, telefone, email FROM visitantes";

        $query = $db->query($sql);

        return $query->getResultArray();
    }

    public function buscarOuCriar($nome, $cpf, $telefone, $email)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT id_visitante FROM visitantes WHERE cpf = ?";

        $query = $db->query($sql, [$cpf]);

        $result = $query->getRowArray();

        if ($result) {
            return $result['id_visitante'];
        }

        $sql = "INSERT INTO visitantes (nome, cpf, telefone, email)
            VALUES (?, ?, ?, ?)";
        $db->query($sql, [$nome, $cpf, $telefone, $email]);

        return $db->insertID();
    }

    public function buscarVisitantePorId($id)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT * FROM visitantes WHERE id_visitante = ?";

        return $db->query($sql, [$id])->getRowArray();
    }

    public function editarVisitante($id, $nome, $cpf, $telefone, $email)
    {
        $db = \Config\Database::connect();

        $sql = "UPDATE visitantes SET nome = ?, cpf = ?, telefone = ?, email = ? WHERE id_visitante = ?";

        return $db->query($sql, [$nome, $cpf, $telefone, $email, $id]);
    }
}
