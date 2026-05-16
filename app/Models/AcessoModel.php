<?php

namespace App\Models;

use CodeIgniter\Model;

class AcessoModel extends Model
{
    protected $table = 'acessos';
    protected $primaryKey = 'id_acesso';
    protected $allowedFields = [
        'id_visitante',
        'id_usuario',
        'area',
        'hora_entrada',
        'hora_saida',
        'status'
    ];

    public function criarAcesso($visitante_id, $area, $id_usuario)
    {

        $ativo = $this->where('id_visitante', $visitante_id)->where('status', 'ativo')->first();
        if ($ativo) {
            return false;
        }

        $db = \Config\Database::connect();

        $sql = "INSERT INTO acessos
            (id_visitante, id_usuario, area, hora_entrada, status)
            VALUES (?, ?, ?, ?, ?)";

        $db->query($sql, [
            $visitante_id,
            $id_usuario,
            $area,
            date('Y-m-d H:i:s'),
            'ativo'
        ]);

        return $db->insertID();
    }

    public function finalizarSaida($acesso_id)
    {
        $db = \Config\Database::connect();

        $sql = "UPDATE acessos
            SET hora_saida = ?, status = ?
            WHERE id_acesso = ?";

        $db->query($sql, [
            date('Y-m-d H:i:s'),
            'finalizado',
            $acesso_id
        ]);
    }

    public function buscarTodosAcessos()
    {
        $db = \Config\Database::connect();

        $sql = "SELECT * FROM acessos";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function buscarAcessosAtivos()
    {
        $sql = "SELECT 
            v.nome,
            v.email,
            v.cpf,
            ac.area,
            ac.hora_entrada,
            ac.status
            FROM acessos ac
            JOIN visitantes v ON ac.id_visitante = v.id_visitante
            WHERE ac.status = 'ativo'";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function buscarAtivoPorCpf($cpf)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT ac.id_acesso, v.nome, ac.area, ac.hora_entrada
            FROM acessos ac
            JOIN visitantes v ON ac.id_visitante = v.id_visitante
            WHERE v.cpf = ?
            AND ac.status = 'ativo'
            LIMIT 1";

        return $db->query($sql, [$cpf])->getRowArray();
    }

    public function buscarHistorico()
    {
        $sql = "SELECT
                v.nome,
                v.cpf,
                ac.area,
                ac.hora_entrada,
                ac.hora_saida,
                TIMESTAMPDIFF(MINUTE, ac.hora_entrada, ac.hora_saida) AS duracao_minutos,
                ac.status
            FROM acessos ac
            JOIN visitantes v ON ac.id_visitante = v.id_visitante
            WHERE ac.status = 'finalizado'
            ORDER BY ac.hora_entrada DESC";

        $query = $this->db->query($sql);

        return $query->getResultArray();
    }

    public function getDashboardStats()
    {
        $sqlAtivos = "SELECT COUNT(*) as total FROM acessos WHERE status = 'ativo'";
        $ativos = $this->db->query($sqlAtivos)->getRowArray()['total'];

        $sqlTotal = "SELECT COUNT(*) as total FROM visitantes";
        $total = $this->db->query($sqlTotal)->getRowArray()['total'];

        $sqlHoje = "SELECT COUNT(*) as total FROM acessos 
                WHERE DATE(hora_entrada) = CURDATE()";
        $hoje = $this->db->query($sqlHoje)->getRowArray()['total'];

        return [
            'ativos' => $ativos,
            'total' => $total,
            'hoje' => $hoje
        ];
    }
}