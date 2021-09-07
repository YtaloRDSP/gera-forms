<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="d-sm-flex align-content-center justify-content-sm-center align-items-sm-center"
  style="background: #162D70;">
  <div class="container align-content-center" style="max-width: 500px;">
    <div class="card" style="max-width: 500px;background: rgba(255,255,255,0);border-color: rgba(33,37,41,0);">
      <div class="card-body" style="border-radius: 15px;background: #7997F2;border-color: var(--bs-blue);margin: suto;margin-top: 25px;">
        <h4 class="card-title" style="font-size: 28px;text-align: left;">Login</h4>
        <form action="assets/autentic/valida.php" method="post" id="form">
          <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
            <span class="input-group-text" style="background: #384670;color: var(--bs-white);width: 5.0rem;">Usuario</span>
            <input class="form-control" type="text" id="user" name="user">
          </div>
          <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
            <span class="input-group-text" style="background: #384670;color: var(--bs-white);width: 5rem;">Senha</span>
            <input class="form-control" type="password" id="senha" name="senha">
          </div>
          <button class="btn btn-primary text-end d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center"
            type="button" style="margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;"
            title="Realizar Login" onclick="enviar()"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
              fill="none" style="background: #264BBD;">
              <path
                d="M15.4857 20H19.4857C20.5903 20 21.4857 19.1046 21.4857 18V6C21.4857 4.89543 20.5903 4 19.4857 4H15.4857V6H19.4857V18H15.4857V20Z"
                fill="currentColor"></path>
              <path
                d="M10.1582 17.385L8.73801 15.9768L12.6572 12.0242L3.51428 12.0242C2.96199 12.0242 2.51428 11.5765 2.51428 11.0242C2.51429 10.4719 2.962 10.0242 3.51429 10.0242L12.6765 10.0242L8.69599 6.0774L10.1042 4.6572L16.4951 10.9941L10.1582 17.385Z"
                fill="currentColor"></path>
            </svg></button>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/script.min.js"></script>
  <script>
    function enviar(){
      var request
      usuario = document.getElementById('user').value
      senha = document.getElementById('senha').value
      if(usuario != '' && senha != ''){
        $("#form").submit();
      } else{
        alert('Campos não preenchidos')
      }
    }
  </script>
</body>
</html>