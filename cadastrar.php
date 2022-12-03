<?php
    header ('Content-type: text/html; charset=UTF-8');
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITULO-->
    <title>UPLM - Cadastrar</title>
    <!-- ICONE UPLM-->
    <link rel="shortcut icon" href="img/logoUPLM.png" type="image/x-con">
    <!-- Linkar o html com Css -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
            <!-- CABEÇALHO -->
            <header>
                <div class="float-container">
                    <div class="float-child">
                        <img class="img1" src="img/logoUPLM.png" alt="UPLM logo" width="70" height="70">
                    </div>
                </div>
                <div class="float-child">
                </div>
                <a class="a2" href="pagInicial.html"><strong>início</strong></a>
                <a class="a2" href="pagDocs.html"><strong>docs</strong></a>
                <a class="a2" href="pagApi.html"><strong>api</strong></a>
                <a class="a2" href="pagMonetizacao.html"><strong>monetização</strong></a>
                <a class="a2" href="index.php" style="color: #9c161f;"><strong>entrar</strong></a>
            </header>
            <!---->
    <div id="corpo-form-Cad">
        <div style="box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.5);" class="container-second">
        <h1>Cadastrar</h1>
        <form method="POST">
            <label class="label-input" for="">
                <i class="far fa-user icon-modify"></i>
                <input style="text-transform: capitalize" type="text" name="nome" placeholder="Nome Completo" maxlength="80">
            </label>
            <label class="label-input" for="">
                <i class="far fa-envelope icon-modify"></i>
                <input type="email" name="email" placeholder="Email" maxlength="100">
            </label>
            <label class="label-input" for="">
                <i class="fas fa-lock icon-modify"></i>
                <input type="password" name="senha" placeholder="Senha" id="myInput" maxlength="20">
                <input class="checkbox1" type="checkbox" onclick="myFunction()">
            </label>
            <label class="label-input" for="">
                <i class="fas fa-lock icon-modify"></i>
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="20">
            </label>
            <button class="btn btn-second" type="submit">CADASTRAR</button>
            <a href="index.php">Já possui uma conta?<strong> Entre!</strong></a>
        </form>
        </div>
    </div>

<!--SCRIPT PARA MOSTRAR A SENHA-->
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php 
//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha =  addslashes($_POST['confSenha']);
    
    //verificar se esta preenchido
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conection("bd_uplm","localhost","root","");
        if($u->msgErro == "")//esta tudo certo
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$email,$senha))
                {
                    ?>
                    <div id="msg-sucesso">
                    Cadastrado com sucesso! Acesse para entrar! 
                    </div>
                    <?php
                }       
                else
                {
                    ?>
                        <div class="msg-erro">
                        Email já cadastrado!
                        </div>
                    <?php
                }     
            }
            else
            {
                ?>
                    <div class="msg-erro">
                    Senha e Confirmar Senha não correspondem!
                    </div>
                <?php
            }
            
        }
        else
        {
            ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
            <?php
        }

    }
    else
    {
        ?>
            <div class="msg-erro">
            Preencha todos os campos!
            </div>
        <?php
    }
}

?>


    
</body>
</html>