<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuario(nome,email) VALUES ('$nome','$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Cadastro concluído com sucesso!');
            window.location.href='index.php';
            </script>";
        }
    mysqli_close($mysqli);
?>