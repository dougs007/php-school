<?php
include_once 'Aluno.php';

$aluno = new Aluno();
$arAlunos = $aluno->recuperarDados();

include_once '../public/Cabecalho.php';
?>
    <h1 class="text-center">Alunos</h1>
    <a class="btn btn-primary" href=formulario.php>Novo Aluno</a>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td style="text-align: center;">Ações</td>
            <td>Id</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Endereço</td>
            <td>Nota</td>
        </tr>

        <?php
            foreach ($arAlunos as $aluno) :
        ?>
            <tr>
                <td style="width: 151px">
                    <a href="formulario.php?id_aluno=<?= $aluno['id_aluno'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                    <a href="processamento.php?acao=excluir&id_aluno=<?= $aluno['id_aluno'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                </td>
                <td><?= $aluno['id_aluno'] ?></td>
                <td><?= $aluno['nome'] ?></td>
                <td><?= $aluno['telefone'] ?></td>
                <td><?= $aluno['endereco'] ?></td>
                <td><?= number_format($aluno['nota'], 1, ',', '.'); ?></td>
            </tr>
        <?php
            endforeach;
        ?>
    </table>

<?php
include_once '../public/Rodape.php';
