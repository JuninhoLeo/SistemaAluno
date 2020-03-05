<?php
include 'banco.php';
$idAluno = trim($_GET['id']);

$pdo = Banco::connectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT tb_aluno.nome, tb_aluno.cod_curso, tb_curso.nome as curso, DATE_FORMAT(tb_aluno.dn, '%Y-%m-%d') As dn, tb_aluno.telefone 
        from tb_aluno
        INNER JOIN tb_curso ON(tb_aluno.cod_curso = tb_curso.cod_curso) 
        WHERE tb_aluno.cod_aluno = ?";
$q = $pdo->prepare($sql);
$q->execute(array($idAluno));
$data = $q->fetch(PDO::FETCH_ASSOC);
$aluno = $data['nome'];
$codCurso = $data['cod_curso'];
$curso = $data['curso'];
$nasc = $data['dn'];
$telefone = $data['telefone'];
Banco::desconectar();

?>
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
    @import url('https://fonts.googleapis.com/css?family=Old+Standard+TT&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap');

    nav#menu {
        border-top: .2px solid silver;
    }

    a#link {
        text-decoration: none;
        color: black;
    }

    .box {
        width: 800px;
        height: 150px;
    }

    .box1 {
        width: 250px;
        height: 150px;
    }

    .box2 {
        width: 500px;
        height: 200px;
        margin-left: 10px;
    }

    .container {
        width: 100vw;
        height: 10vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    input#btnCadastrar {
        text-decoration: underline;
        font-size: 26px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="menu">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i style="color: blue"><u>Voltar</u></i><span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="menu">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <h2 style="font-family: 'Libre Baskerville';"><a id="link">Atualizar Aluno</a></h2>
        </div>
    </nav>
    <br><br><br>
    <form action="UpdAluno.php" method="POST">
        <div class="container">
            <div class="box1">
                <div style="text-align: right">
                    <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 30px">Aluno:</label>
                </div>
                <div style="text-align: right">
                    <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 30px">Curso:</label>
                </div>
                <div style="text-align: right">
                    <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 30px">Data Nasc:</label>
                </div>
                <div style="text-align: right">
                    <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 30px">Telefone:</label>
                </div>
            </div>
            <div class="box2">
                <div style="margin-left: 15px; margin-top: 4px">
                    <input type="text" name="aluno" id="aluno" size="65" style="height: 35px" value="<?php echo $aluno ?>" required>
                </div>
                <div style="margin: 15px; margin-top: 20px;">
                    <select name="curso" id="curso" style="width: 493px; height: 35px" required>
                        <option value="<?php echo $codCurso ?>"><?php echo $curso ?></option>
                        <?php
                        $pdo = Banco::connectar();
                        $sql = 'SELECT * FROM tb_curso';
                        foreach ($pdo->query($sql) as $row) {
                        ?>
                            <option value='<?php echo $row['cod_curso']; ?>'><?php echo $row['nome']; ?></option>";
                        <?php
                        }
                        Banco::desconectar();
                        ?>
                    </select>
                </div>
                <div style="margin: 15px; margin-top: 20px;">
                    <input type="date" name="data" id="data" style="height: 35px; width: 255px" value="<?php echo $nasc ?>" required>
                </div>
                <div style="margin: 15px; margin-top: 15px;">
                    <input type="text" name="telefone" id="telefone" size="31" style="height: 35px" value="<?php echo $telefone ?>" required>
                    <input type="hidden" name="id" id="id" value="<?php echo $idAluno ?>">
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="container">
            <div class="box">
                <center>
                    <input type="submit" class="btn btn-link" id="btnCadastrar" value="Atualizar">
                </center>
            </div>
        </div>
    </form>

</body>

</html>