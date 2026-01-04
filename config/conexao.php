<?php
// Configurações de conexão com o banco de dados


//iniciar sessões:
session_start();


//configuração de e-mail
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

//-Local
$modo = "local";

if ($modo == "local") {
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "login";
}
//-Produção
else {
    $host = "";
    $usuario = "";
    $senha = "";
    $banco = "";
}

//Tentar conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    //Definir o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}


function limparDados($dados)
{
    // Remover espaços em branco no início e no fim
    $dados = trim($dados);
    // Remover barras invertidas
    $dados = stripslashes($dados);
    // Converter caracteres especiais em entidades HTML
    $dados = htmlspecialchars($dados);
    return $dados;
}
//FUNÇÃO PARA AUTENTICAÇÃO
function auth($tokenSessao)
{
    global $pdo;
    // VERIFICAR SE TEM AUTORIZAÇÃO
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token = ? LIMIT 1"); // Removido o AND antes do LIMIT
    $sql->execute([$tokenSessao]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        return $usuario;
    } else {
        return false;
    }
}
