<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Sistema Zica</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Old+Standard+TT&display=swap');

    nav#menu {
        border-top: .2px solid silver;
    }

    table {
        border: 3px solid black;
    }

    a#link {
        text-decoration: none;
        color: black;
    }

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                    <a class="nav-link" href="cadastrarAluno.php"><i style="color: blue"><u>Cadastrar aluno</u></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cadastrarCurso.php"><i style="color: blue"><u>Cadastrar curso</u></i><span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark" id="menu">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <h2 style="font-family: 'Libre Baskerville';"><a id="link">Listar alunos</a></h2>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark" id="menu">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <div class="form-row">
                <div class="form-group">
                <br>
                    <form id="frmBusca" name="frmBusca" action="indexfilter.php" method="POST">
                        <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 26px">Nome:</label>
                        <input type="text" name="pesquisa" id="pesquisa" size="30" style="height: 35px">&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="lblCurso" id="lblCurso" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 26px">Curso:</label>
                        <select name="curso" id="curso" class="resultado" style="width: 200px; height: 35px">
                            <option value="">Selecione</option>
                            <?php
                            include 'banco.php';
                            $pdo = Banco::connectar();
                            $sql = 'SELECT * FROM tb_curso';
                            foreach ($pdo->query($sql) as $row) {
                            ?>
                                <option value='<?php echo $row['cod_curso'] ?>'><?php echo $row['nome'] ?></option>";
                            <?php
                            }
                            ?>
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <table class="table table table-bordered" id="alunos">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Aluno</th>
                <th scope="col">Telefone</th>
                <th scope="col">Curso</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <?php
        $pdo = Banco::connectar();
        $sql = "SELECT distinct tb_aluno.cod_aluno as id, tb_aluno.nome, tb_aluno.telefone, tb_curso.nome AS curso 
                FROM tb_aluno 
                INNER JOIN tb_curso ON(tb_aluno.cod_curso = tb_curso.cod_curso)";
        foreach ($pdo->query($sql) as $row) {
        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $row['nome'] ?></th>
                    <td><?php echo $row['telefone'] ?></td>
                    <td><?php echo $row['curso'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-link" id="btnAtualizar" onclick="javascript:location.href='atualizaAluno.php?id='+<?php echo $row['id'] ?>">
                            <u>Atualizar</u>
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script>
</body>

</html>