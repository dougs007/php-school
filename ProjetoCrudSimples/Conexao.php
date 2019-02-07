<?php

class Conexao {
	protected $conexao;

	public function conectar()
	{
	    try{
            $this->conexao = new PDO('mysql:host=127.0.0.1;dbname=escola;charset=utf8', 'root', '');
        }catch(Exception $e){
            echo'<div class="panel panel-danger">
                     <div class="panel-heading">
                         <h3 class="panel-title">Atenção!</h3>
                     </div>
                     <div class="panel-body">
                         Não foi possível conectar ao banco de dados :(<br><br>
                         <b>Código</b>: '. $e->getCode() .'<br><br>
                         <b>Mensagem</b>: '. $e->getMessage() .'<br><br>
                         <b>Arquivo</b>: '. $e->getFile() .'<br><br>

                     </div>
                 </div>
            ';die;
        }
	}

	public function desconectar()
	{
		$this->conexao = null;
	}

	public function executar($sql)
	{
		$this->conectar();
		$this->conexao->query($sql);
        $lastId = $this->conexao->lastInsertId();
		$this->desconectar();
        return $lastId;
	}

	public function recuperarDados($sql)
	{
		$this->conectar();

        $retorno = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

		$this->desconectar();
		return $retorno;
	}
}