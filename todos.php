<?php
include_once('bancoMysqli.php');

$aluno = "SELECT * FROM tb_curso";
$resultado = mysqli_query($conn, $aluno);

if (($resultado) and ($resultado->num_rows != 0)) {
    echo "<option value=''>Selecione</option>";
    while ($rows = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $rows['cod_curso'] . "'>" . $rows['nome'] . "</option>";
    }
} else {
    echo "<option value=''>Nenhum resultado</option>";
}
