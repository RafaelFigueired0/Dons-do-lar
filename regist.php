
<?php
require_once __DIR__ . "/models/User.php";
require __DIR__ . "/models/db_connection.php";

$user_service= new DbUserService();
if(!empty($_POST)) {
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['name'])) {
        if($_POST['password'] == $_POST['confirmPassword']) {
            $user = $user_service->postUser($_POST['email'], $_POST['name'], $_POST['password'],$_POST['phone']);  
            if($user != null) {
                header("Location: /login.php");
                return;
            }
        }
    }
}
?>
<?php require './parts/header.php'; ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Password não é igual à password de confirmação
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- register -->
<div class="register">
		<div class="container">
			<h2>Registe-se aqui</h2>
			<div class="login-form-grids">
				
				
					<form action="/regist.php" method="post">
					<h5>Informação de perfil</h5>
                <label for="inputName" class="sr-only">Nome </label>
                <input name ="name" type="text" id="inputName" class="form-control" placeholder="Nome" required=""
               value="<?php echo isset( $_POST['name'] ) ? $_POST['name'] : ""; ?>">
                <label for="inputphone" class="sr-only">Telemóvel</label>
                <input name ="phone" type="tel" id="inputphone" class="form-control" placeholder="Telemóvel"
                value="<?php echo isset( $_POST['phone'] ) ? $_POST['phone'] : ""; ?>">
					<h6>Informação de login</h6>
					<label for="inputEmail" class="sr-only">Email address</label>
					<input name ="email" type="email" id="inputEmail" class="form-control" placeholder="Endereço de Email" required="" autofocus="" 
                    value="<?php echo isset( $_POST['email'] ) ? $_POST['email'] : ""; ?>">
					<label for="inputPassword" class="sr-only" minimunlength="6">Password</label>
                <input name ="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="" >
                <label for="inputConfirmPassword" class="sr-only">Password</label>
                <input name ="confirmPassword" type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirmar Password" required="" minimunlength="6">
					<div class="register-check-box">
						<div class="check">
                        <body onload="disableSubmit()">
                        <br>
 <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">  Aceito os termos e condições
<br><br>
  <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" a href="login.php">Sign up</button>
</body> </label>
						</div>
						<div>
						</div>
					</div>
					
				</form>
			</div>
			<div class="register-home">
				<a href="index.php">Inicio</a>
			</div>
		</div>
	</div>
<script>

 function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
  
</script>
<?php require './parts/footer.php'; ?>