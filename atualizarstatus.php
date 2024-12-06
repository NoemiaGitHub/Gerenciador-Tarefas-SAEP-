<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $status = $_POST['status'];
    $sql = "UPDATE tarefa SET status=? WHERE id=?";
    $edp = $conn->prepare($sql) or die($conn->error);
    if(!$edp){
        echo "Erro:".$conn->error;
    }
    $edp->bind_param('si', $status, $id);
    $edp->execute();
    $edp->close();
    echo "<script language='javascript' type='text/javascript'>
            alert('Tarefa atualizada com sucesso!');
            window.location.href='index.php';
            </script>";
?>