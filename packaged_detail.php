<?php require_once './parts/backofficeheader.php'; ?>
<?php require 'models/packagedservice.php';
require 'models/State.php';

$packagedservice = new DBPackagedService();

if(!empty($_POST)) {

  if(isset($_POST['update_state'])&& isset($_POST['state'])) {

      $packagedservice->update_state(getid(), $_POST['state']);  
      
      
  }
}   


$packaged = $packagedservice->getPackagedByid(getid());
$packagedlist =$packagedservice->getPackagedByuserid($packaged->getusers_id());


?>

<div class="row">
  <div class="column1" style="background-color:#cccccc;">
    <h2>Encomenda:<?php echo $packaged->getpackaged_id()?><br>
    Preço:<?php echo $packaged->getprice()?><br>
    Nº de cliente:<?php echo $packaged->getusers_id()?><br>
    Nome do cliente:<?php echo $packaged->getusers_name()?><br>
    Estado:<?php echo State::getDisplayText($packaged->getstate())?><br>
    <form name = "form1"  method = "post"  >    
    <div class = "form_group">    
                    <label for="state">Trocar estado:</label>    
                    <select id="state" name="state">
                           <option  value= "<?php echo State::$OPEN?>" ><?php echo State::getDisplayText(State::$OPEN)?> </option>
                           <option  value= "<?php echo State::$IN_PROGRESS?>" ><?php echo State::getDisplayText(State::$IN_PROGRESS)?> </option>
                           <option  value= "<?php echo State::$READY?>" ><?php echo State::getDisplayText(State::$READY)?> </option>
                           <option  value= "<?php echo State::$CANCELED?>" ><?php echo State::getDisplayText(State::$CANCELED)?> </option>
                           <option  value= "<?php echo State::$CLOSED?>" ><?php echo State::getDisplayText(State::$CLOSED)?> </option>
                    </select>
                      </div>  
                      <button  class = "button1" name="update_state" type="submit">Atualizar</button>   
                      </form>
    </h2><hr/>
    </div>
</div>
<?php
foreach ($packaged->getproducts() as $product){
?>
<div class="row">
  <div class="column1" style="background-color:#cccccc;">
 <h1>  Detalhes do produto:<br></h1>
  <h2>  Produtos: <?php echo $product->getname()?><br>
    Quantidade: <?php echo $product->getquantity()?><br>
    Preço individual: <?php echo $product->getprice()?><br>
    Preço total: <?php echo $product->getquantity() * $product->getprice()?></h2><hr/>
    </div>
</div>
<?php } ?>

<?php require_once './parts/backofficefooter.php'; ?>