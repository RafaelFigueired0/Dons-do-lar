<?php
 $preTitle = "Profile"; 
 
require_once './parts/header.php';
require_once './models/db_connection.php';

$user_service = new DbUserService();
?>
<div class="login">
		<div class="container">
            
    
    
    <div class="col-md-5 mx-auto">
    <form method="get" action="new_info.php">
   
    </form>
    <br>
    
    </div>
    </div>
    <?php
    if(!empty($_POST)) {
    if(isset($_POST['name']) && $_POST['name'] != null && $_POST['name']  != "") {
            $user = $user_service->UpdateUser($_SESSION['email'], $_POST['name'], $_POST['phone']);
            if($user != null) {
                $_SESSION['name'] = $user->getName();
                $_SESSION['phone'] = $user->getphone();
                redirectTo("/profile.php");
                return;
            }
        }
}
?>
    <body>    
        <link href = "style.css" type = "text/css" rel = "stylesheet" />    
        <br><br><h2><center>Editar Perfil</h2>    
        <br>
        <form name = "form1" action="/profile.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Email:</label>    
                    <?php echo $_SESSION['email']?>
                </div>    
                <div class = "form_group">    
                    <label>Name:</label>    
                    <input type = "text" placeholder="Nome" name = "name" value="<?php echo $_SESSION['name']?>" required />    
                 </div>     
                 <div class = "form_group">    
                    <label>Telemovel:</label>    
                    <input type = "tel" placeholder="Número de telefone" name ="phone" value = "<?php echo $_SESSION['phone']?>"  />    
                 </div>     
                     <form method="post" class="btn-1" action="update">
                    <button   type="submit" class="button-profile"><b>Save</b> </button>
                
    </form>  
</div>
</div>  
    <?php require_once './parts/footer.php';?>