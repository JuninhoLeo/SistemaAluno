<?php
include 'banco.php';

$aluno = trim($_POST['aluno']);
$curso = trim($_POST['curso']);
$nasc = trim($_POST['data']);
$telefone = trim($_POST['telefone']);

$pdo = Banco::connectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'INSERT INTO tb_aluno(nome, dn, telefone, data_cadastro, cod_curso)
        values(?, ?, ?, curdate(), ?)';
$q = $pdo->prepare($sql);
$q->execute(array($aluno, $nasc, $telefone, $curso));
Banco::desconectar();
header('location: index.php');
