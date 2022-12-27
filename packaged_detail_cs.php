<?php require './parts/header.php';?>
<?php require 'models/packagedservice.php';
require 'models/State.php';

$packagedservice = new DBPackagedService();
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
<?php require './parts/footer.php';?> 