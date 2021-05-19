<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="teal darken-4">
        <div class="container">
            <div class="card blue-grey darken-1">
                <form action="valida.php" method="post" id="form">
                    <div class="card-content white-text">
                        <span class="card-title"><h4>Autenticação</h4></span>
                        <div class="divider"></div>
                        <div class='row'>
                            <div class="input-field col s12 m6">
                                <label for="usuario">Usuario:</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="input-field col s12 m6">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="waves-effect waves-dark btn" type="submit"><i class="material-icons">arrow_forward_ios</i></button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>