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
    <h3>&nbsp;&nbsp;Tarefas</h3>
    <div class="divs3">
        <div>
            <h4>A Fazer</h4>
            <table class="table table-hover">
            <?php
                include 'conecta.php';
                $afazer = mysqli_query($conn, "SELECT tarefa.*, usuario.id AS iduser,usuario.nome FROM tarefa,usuario where tarefa.id_usuario = usuario.id AND tarefa.status = 'A Fazer' ORDER BY id");
                $row = mysqli_num_rows($afazer);
                if ($row > 0) {
                    while ($dados = $afazer->fetch_array()) {
                        $id = $dados['id'];
                        echo '<tr>';
                        echo '<td><b>Descrição:</b>&nbsp;'.$dados['descricao'].'<br/>';
                        echo '<b>Setor:</b>&nbsp;'.$dados['setor'].'<br/>';
                        echo '<b>Prioridade:</b>&nbsp;'.$dados['prioridade'].'<br/>';
                        echo '<b>Vinculado a:</b>&nbsp;'.$dados['nome'].'<br/>';
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='editartarefa.php?id=$id' class='btn btn-primary'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='excluirtarefa.php?id=$id' class='btn btn-primary'>Excluir</a><br/><br/>";
                        echo "<form action='atualizarstatus.php?id=$id' method='POST'>";
                        echo "<select name='status'>
                                <option value='A Fazer' selected>A Fazer</option>
                                <option value='Fazendo'>Fazendo</option>
                                <option value='Pronto'>Pronto</option>
                             </select>&nbsp;&nbsp;<input type='submit' class='btn btn-primary' value='Alterar Status'>";
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
            ?>
            </table>
        </div>
        <div>
            <h4>Fazendo</h4>
            <table class="table table-hover">
            <?php
                include 'conecta.php';
                $afazer = mysqli_query($conn, "SELECT tarefa.*, usuario.id AS iduser,usuario.nome FROM tarefa,usuario where tarefa.id_usuario = usuario.id AND tarefa.status = 'Fazendo' ORDER BY id");
                $row = mysqli_num_rows($afazer);
                if ($row > 0) {
                    while ($dados = $afazer->fetch_array()) {
                        $id = $dados['id'];
                        echo '<tr>';
                        echo '<td><b>Descrição:</b>&nbsp;'.$dados['descricao'].'<br/>';
                        echo '<b>Setor:</b>&nbsp;'.$dados['setor'].'<br/>';
                        echo '<b>Prioridade:</b>&nbsp;'.$dados['prioridade'].'<br/>';
                        echo '<b>Vinculado a:</b>&nbsp;'.$dados['nome'].'<br/>';
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='editartarefa.php?id=$id' class='btn btn-primary'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='excluirtarefa.php?id=$id' class='btn btn-primary'>Excluir</a><br/><br/>";
                        echo "<form action='atualizarstatus.php?id=$id' method='POST'>";
                        echo "<select name='status'>
                                <option value='A Fazer'>A Fazer</option>
                                <option value='Fazendo' selected>Fazendo</option>
                                <option value='Pronto'>Pronto</option>
                             </select>&nbsp;&nbsp;<input type='submit' class='btn btn-primary' value='Alterar Status'>";
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
            ?>
            </table>
        </div>
        <div>
            <h4>Pronto</h4>
            <table class="table table-hover">
            <?php
                include 'conecta.php';
                $afazer = mysqli_query($conn, "SELECT tarefa.*, usuario.id AS iduser,usuario.nome FROM tarefa,usuario where tarefa.id_usuario = usuario.id AND tarefa.status = 'Pronto' ORDER BY id");
                $row = mysqli_num_rows($afazer);
                if ($row > 0) {
                    while ($dados = $afazer->fetch_array()) {
                        $id = $dados['id'];
                        echo '<tr>';
                        echo '<td><b>Descrição:</b>&nbsp;'.$dados['descricao'].'<br/>';
                        echo '<b>Setor:</b>&nbsp;'.$dados['setor'].'<br/>';
                        echo '<b>Prioridade:</b>&nbsp;'.$dados['prioridade'].'<br/>';
                        echo '<b>Vinculado a:</b>&nbsp;'.$dados['nome'].'<br/>';
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='editartarefa.php?id=$id' class='btn btn-primary'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='excluirtarefa.php?id=$id' class='btn btn-primary'>Excluir</a><br/><br/>";
                        echo "<form action='atualizarstatus.php?id=$id' method='POST'>";
                        echo "<select name='status'>
                                <option value='A Fazer'>A Fazer</option>
                                <option value='Fazendo'>Fazendo</option>
                                <option value='Pronto' selected>Pronto</option>
                             </select>&nbsp;&nbsp;<input type='submit' class='btn btn-primary' value='Alterar Status'>";
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
            ?>
            </table>
        </div>
    </div>
</body>
</html>