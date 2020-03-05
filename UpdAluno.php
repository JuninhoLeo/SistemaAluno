<?php
include 'banco.php';

$id = trim($_POST['id']);
$aluno = trim($_POST['aluno']);
$curso = trim($_POST['curso']);
$nasc = trim($_POST['data']);
$telefone = trim($_POST['telefone']);

$pdo = Banco::connectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'UPDATE tb_aluno 
        SET NOME=?, DN=?, TELEFONE=?, COD_CURSO=? 
        WHERE COD_ALUNO=?';
$q = $pdo->prepare($sql);
$q->execute(array($aluno, $nasc, $telefone, $curso, $id));
Banco::desconectar();
header('location: index.php');
