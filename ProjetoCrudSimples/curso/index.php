<?php
include_once 'Curso.php';

$arrCursos = (new Curso())->recuperarDados();

include_once '../public/Cabecalho.php';
?>
    <h1 class="text-center">Cursos</h1>
    <a class="btn btn-primary" href="formulario.php">Novo Curso</a>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td style="text-align: center;">Ações</td>
            <td>Id</td>
            <td>Nome</td>
        </tr>
        <?php 
            foreach ($arrCursos as $curso) :
        ?>
            <tr>
                <td style="width: 151px">
                    <a href="formulario.php?id_curso=<?= $curso['id_curso'] ?>" class="btn btn-warning">Alterar</a>
                    <a href="processamento.php?acao=excluir&id_curso= <?= $curso['id_curso'] ?>"
                       class="btn btn-danger">Excluir</a>
                </td>
                <td><?= $curso['id_curso'] ?></td>
                <td><?= $curso['nome'] ?></td>
            </tr>
        <?php
            endforeach;
        ?>
    </table>
<?php
include_once '../public/Rodape.php';
