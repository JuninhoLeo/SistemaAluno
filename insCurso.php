<?php
include 'banco.php';

$curso = trim($_POST['curso']);

$pdo = Banco::connectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'INSERT INTO tb_curso(nome)
        values(?)';
$q = $pdo->prepare($sql);
$q->execute(array($curso));
Banco::desconectar();
header('location: index.php');