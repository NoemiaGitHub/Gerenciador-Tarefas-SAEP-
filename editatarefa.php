<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $idusuario = $_POST['usuario'];
    $prioridade = $_POST['prioridade'];
    $status = "A Fazer";
    $sql = "UPDATE tarefa SET id_usuario=?,descricao=?,setor=?,prioridade=?,data=NOW(),status=? WHERE id=?";
    $edp = $conn->prepare($sql) or die($conn->error);
    if(!$edp){
        echo "Erro:".$conn->error;
    }
    $edp->bind_param('issssi', $idusuario, $descricao, $setor, $prioridade, $status, $id);
    $edp->execute();
    $edp->close();
    header("Location: index.php");
?>