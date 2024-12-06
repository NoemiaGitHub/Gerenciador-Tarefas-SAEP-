<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM tarefa WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script language='javascript' type='text/javascript'>
             alert('Tarefa excluída com sucesso!');
             window.location.href='index.php'
             </script>";
    }
    mysqli_close($conn);
?>