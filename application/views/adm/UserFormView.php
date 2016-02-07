<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cadasto de Usuário</title>

        <!-- Bootstrap -->
        <link href="<?= BOOTSTRAP_CSS; ?>bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="<?= BOOTSTRAP_CSS ?>bootstrap-theme.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?= BOOTSTRAP_ASSETS_CSS ?>ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1>Cadastro de Usuário</h1>

        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" value="<?= $usuario->getName() ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $usuario->getEmail() ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                </div>
                <div class="form-group">
                    <label for="resenha">Redigite a Senha</label>
                    <input type="password" class="form-control" name="resenha" id="resenha" placeholder="Redigite sua senha">
                </div>
                <div class="form-group">

                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked="checked"> Ativo
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <?php
            echo '<pre>';
            print_r($usuario->getName());
            var_dump($usuario->getPassword());
            print_r($usuario->getEmail());
            echo '</pre>';
            echo '<pre>';
            var_dump(sha1('teste ricardo emdnes'));
            echo '</pre>';
            ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= BOOTSTRAP_JS ?>bootstrap.min.js"></script>
    </body>
</html>