<?php

include_once '../Conexao.php';

class Curso
{

    protected $id_curso;
    protected $nome;

    # Getters and Setters de Curso.
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
     * Retorna array com todos os cursos.
     */
    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT
                    *
                FROM curso
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
                FROM curso
                WHERE
                    id_curso = '". (int)$id ."'
        ";

        $curso = $conexao->recuperarDados($sql);

        $this->id_curso = $curso[0]['id_curso'];
        $this->nome     = $curso[0]['nome'];
    }

    /**
     * @param $curso
     * @return mixed
     * Função para criar dados novos.
     */
    public function inserir($curso)
    {
        $nome = $curso['nome'];

        $conexao = new Conexao();
        $sql = "INSERT INTO curso
                    (nome)
                VALUES
                    ('$nome')
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $curso
     * @return mixed
     * Função para alterar dados já existentes
     */
    public function alterar($curso)
    {
        $id   = $curso['id_curso'];
        $nome = $curso['nome'];

        $conexao = new Conexao();

        $sql = "UPDATE curso
                    SET nome = '$nome'
                WHERE
                    id_curso = '".(int)$id."'
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $id
     * @return mixed
     * Função para excluir dados.
     */
    public function excluir($id)
    {
        $conexao = new Conexao();
        $sql = "DELETE
                FROM curso
                WHERE
                    id_curso = '". (int)$id."'
        ";

        return $conexao->executar($sql);
    }

}