<?php
    include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Gerenciamento de Tarefas</title>
    <style>
        nav {
            background-color: #0056b3;
        }
        .menu {
            height: 65px;
            display: flex;
            align-items: center;
        }
        .tabela {
            margin-left: auto;
        }
        td {
            padding: 15px;
        }
        a {
            color: white;
            text-decoration: none;
        }
        a:hover {
            color: lightgray;
            text-decoration: none;
        }
        .divs3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px 0;
            margin: 10px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="menu">
            <h4><font color="white">&nbsp;&nbsp;Gerenciamento de Tarefas</font></h4>
            <div class="tabela">
                <table>
                    <tr>
                        <td><a href="cadusuario.php">Cadastro de Usuários</a></td>
                        <td><a href="cadtarefas.php">Cadastro de Tarefas</a></td>
                        <td><a href="index.php">Gerenciar Tarefas</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </nav>
    <br />
    <h3>&nbsp;&nbsp;Cadastro de Tarefas</h3>
    <div class="divs3">
    <form action="cadastrotarefa.php" method="POST">
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="descricao" required/>
                <br/>
                <label>Setor:</label>
                <input type="text" class="form-control" name="setor" required/>
                <br/>
                <label>Usuário:</label><br/>
                <select class="form-select" name="usuario">
                    <?php
                        $sql = "SELECT * FROM usuario";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                        mysqli_close($conn);
                    ?>
                </select>
                <br/>
                <label>Prioridade:</label><br/>
                <select class="form-select" name="prioridade">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
                <br/>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>