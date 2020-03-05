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
        border: .2px solid silver;
    }

    a#link {
        text-decoration: none;
        color: black;
    }

    .box {
        width: 500px;
        height: 150px;
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i style="color: blue"><u>Voltar</u></i><span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark" id="menu">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <h2 style="font-family: 'Libre Baskerville';"><a id="link">Cadastrar curso</a></h2>
        </div>
    </nav>
    <br><br><br>
    <form action="insCurso.php" method="post">
        <div class="container">
            <div class="box">
                <label for="lblNome" id="lblnome" class="text-dark" style="font-family: 'Old Standard TT'; font-size: 30px">Curso:</label>
                <input type="text" name="curso" id="curso" size="50" style="height: 35px" minlength="4" required>
            </div>
        </div>
        <div class="container">
            <div class="box">
                <center>
                    <input type="submit" class="btn btn-link" id="btnCadastrar" value="Cadastrar">
                </center>
            </div>
        </div>
    </form>

</body>

</html>