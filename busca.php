<?php
include_once('bancoMysqli.php');

$aluno = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$aluno = "SELECT tb_curso.cod_curso as id, tb_curso.nome as curso, tb_aluno.nome AS aluno 
          FROM tb_curso 
          inner JOIN tb_aluno on(tb_curso.cod_curso = tb_aluno.cod_aluno) 
          WHERE tb_aluno.nome LIKE '%$aluno%' 
          LIMIT 20";

$resultado = mysqli_query($conn, $aluno);

if (($resultado) AND ($resultado->num_rows != 0)) {
    while($rows = mysqli_fetch_assoc($resultado)){
        echo "<option value='".$rows['id']."'>".$rows['curso']."</option>";
    }
}else{
        echo "<option value=''>Nenhum resultado</option>";
    }