<?php 
    require('config/conexao.php');

    if (isset($_GET['cod_confirm']) && !empty($_GET['cod_confirm'])) {
        $cod = limparDados($_GET['cod_confirm']);

        // Verifica se o código de confirmação existe no banco de dados
        $sql = $pdo->prepare("SELECT id, status FROM usuarios WHERE cod_confirm = ? LIMIT 1");
        $sql->execute([$cod]);
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        //verificando se encontrou o código e atualizando
        if ($usuario) {
            $status = 'confirmado';
            $sql = $pdo->prepare("UPDATE usuarios SET status=?  WHERE cod_confirm=?");
            if($sql->execute([$status, $cod]) ){
                header('Location: index.php?result=ok');
            }
        }else{
            echo "Código de confirmação inválido.";
        }   
    }
?>