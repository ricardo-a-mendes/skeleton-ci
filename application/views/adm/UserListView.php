<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Listagem de Usuário</title>

        <!-- Bootstrap -->
        <link href="<?= BOOTSTRAP_CSS ?>bootstrap.min.css" rel="stylesheet">
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
        <h1>Listagem dos Usuários</h1>

        <div class="col-md-6">
            <?php if (count($arrUsers) > 0): ?>
                <table class="table-responsive table-striped">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>Ativo</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrUsers as $user): ?>
                            <tr>
                                <td><?= $user->getName(); ?></td>
                                <td><?= $user->getEmail(); ?></td>
                                <td><?= $user->getActive(); ?></td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="col-md-6">

        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>