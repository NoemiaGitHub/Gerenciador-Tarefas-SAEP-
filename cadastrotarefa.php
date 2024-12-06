<?php
    include 'conecta.php';
    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $idusuario = $_POST['usuario'];
    $prioridade = $_POST['prioridade'];
    $status = "A Fazer";
    $sql = "INSERT INTO tarefa(id_usuario,descricao,setor,prioridade,data,status) VALUES ('$idusuario','$descricao','$setor','$prioridade',NOW(),'$status')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Cadastro concluído com sucesso!');
            window.location.href='index.php';
            </script>";
        }
    mysqli_close($mysqli);
?>