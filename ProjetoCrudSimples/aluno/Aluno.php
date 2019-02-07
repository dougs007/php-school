<?php

include_once '../Conexao.php';

class Aluno
{
    protected $id_aluno;
    protected $matricula;
    protected $nome;
    protected $telefone;
    protected $endereco;
    protected $data_nascimento;
    protected $sexo;
    protected $id_responsavel;
    protected $id_curso;
    protected $nota;

    # Getters and Setters da Classe de Aluno.
    /**
     * @return mixed
     */
    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    /**
     * @param mixed $id_aluno
     */
    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param mixed $data_nascimento
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getIdResponsavel()
    {
        return $this->id_responsavel;
    }

    /**
     * @param mixed $id_responsavel
     */
    public function setIdResponsavel($id_responsavel)
    {
        $this->id_responsavel = $id_responsavel;
    }

    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param mixed $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }


    /**
     * Função para listagem de todos os dados existentes.
     * Read
     */
    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT
                    *
                FROM aluno
        ";

        return $conexao->recuperarDados($sql);
    }

    /**
     * @param $id
     * Função para carregar todos os dados por ID para ser feito a alteração.
     * Update
     */
    public function carregarPorId($id)
    {
        $conexao = new Conexao();

        $sql = "SELECT
                    *
                FROM aluno
                WHERE
                    id_aluno = '". (int)$id."'
        ";

        $aluno = $conexao->recuperarDados($sql);

        $this->id_aluno        = $aluno[0]['id_aluno'];
        $this->matricula       = $aluno[0]['matricula'];
        $this->nome            = $aluno[0]['nome'];
        $this->telefone        = $aluno[0]['telefone'];
        $this->endereco        = $aluno[0]['endereco'];
        $this->data_nascimento = $aluno[0]['data_nascimento'];
        $this->sexo            = $aluno[0]['sexo'];
        $this->id_responsavel  = $aluno[0]['id_responsavel'];
        $this->id_curso        = $aluno[0]['id_curso'];
        $this->nota            = $aluno[0]['nota'];

    }

    /**
     * @param $aluno
     * @return mixed
     * Função para inserir dados novos.
     * Insert
     */
    public function inserir($aluno)
    {

        $matricula       = $aluno['matricula'];
        $nome            = $aluno['nome'];
        $telefone        = $aluno['telefone'];
        $endereco        = $aluno['endereco'];
        $data_nascimento = $aluno['data_nascimento'];
        $sexo            = $aluno['sexo'];
        $id_responsavel  = $aluno['id_responsavel'];
        $id_curso        = $aluno['id_curso'];
        $nota            = $aluno['nota'];

        $conexao = new Conexao();

        $sql = "INSERT INTO aluno
                    (matricula, nome, telefone,
                    endereco, data_nascimento, sexo,
                    id_responsavel, id_curso, nota)
                VALUES
                    ('$matricula', '$nome', '$telefone',
                    '$endereco', '$data_nascimento', '$sexo',
                    '$id_responsavel', '$id_curso', '$nota')
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $aluno
     * @return mixed
     * Função para alterar dados já existentes.
     * Update
     */
    public function alterar($aluno)
    {

        $id_aluno        = $aluno['id_aluno'];
        $matricula       = $aluno['matricula'];
        $nome            = $aluno['nome'];
        $telefone        = $aluno['telefone'];
        $endereco        = $aluno['endereco'];
        $data_nascimento = $aluno['data_nascimento'];
        $sexo            = $aluno['sexo'];
        $id_responsavel  = $aluno['id_responsavel'];
        $id_curso        = $aluno['id_curso'];
        $nota            = $aluno['nota'];

        $conexao = new Conexao();

        $sql = "UPDATE aluno
                SET nome = '$nome',
                    matricula = '$matricula',
                    telefone = '$telefone',
                    endereco = '$endereco',
                    data_nascimento = '$data_nascimento',
                    sexo = '$sexo',
                    id_responsavel = ".(int)$id_responsavel.",
                    id_curso = ".(int)$id_curso.",
                    nota = '$nota'
                WHERE
                    id_aluno = '".(int)$id_aluno."'
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $id
     * @return mixed
     * Função para excluir algum registro existente.
     * Delete
     */
    public function excluir($id)
    {
        $conexao = new Conexao();

        $sql = "DELETE FROM aluno
                WHERE
                    id_aluno = '".(int)$id."'
        ";

        return $conexao->executar($sql);
    }
}