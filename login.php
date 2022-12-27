
<?php 
require_once __DIR__ . "/models/User.php";
require __DIR__ . "/models/db_connection.php";
$user_service= new DbUserService();
?>
<?php require_once './parts/header.php'; ?>
<?php

if(!empty($_POST)) {echo("1");
    if(isset($_POST['email']) && isset($_POST['password'])) {echo("2");
        if($user_service->validatePassword($_POST['email'], $_POST['password'])) {echo("3");
            $user = $user_service->getUser($_POST['email']);
			$_SESSION['email'] = $user->getEmail(); 
			$_SESSION['name'] = $user->getName();
			$_SESSION['phone'] = $user->getphone();
			$_SESSION['role'] = $user->getrole();
			$_SESSION['users_id'] = $user->getusers_id();
	
			redirectTo("/");
            return;
        }
	}
}

?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Invalid credentials
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- login -->
<div class="login">
		<div class="container">
			<h2>Iniciar sessão</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="/login.php" method="post" >
				<label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
					<label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
					<div class="forgot">
						<a href="#">Esqueceu-se da senha?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>Para novos utilizadores</h4>
			<p><a href="regist.php">Registar-se aqui</a></p>
		</div>
	</div>
<!-- //login -->
<?php require_once './parts/footer.php'; ?> 