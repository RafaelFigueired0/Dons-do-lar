<?php require_once './parts/backofficeheader.php'; ?>
<?php require 'models/packagedservice.php';
require 'models/state.php';
$packagedService = new DBpackagedService();

$packageds = $packagedService->getPackages(getPage());

?>

 <?php
    foreach($packageds->getitems() as $packaged) {

  ?>


<div class="row">
  <div class="column1" style="background-color:#cccccc;">
    <h2>Encomenda:<?php echo $packaged->getpackaged_id()?><br>
    Preço:<?php echo $packaged->getprice()?><br>
    cliente:<?php echo $packaged->getusers_id()?><br>
    Estado:<?php echo State::getDisplayText($packaged->getstate())?></h2>
   
    <br>
   <right><a class = "button1" type="submit" href="packaged_detail.php?id=<?php echo $packaged->getpackaged_id()?>">Detalhes</a><br></right>
    <hr/>
    </div>

                        </div>

    <?php }?>
    <?php getpagination("/encomendas.php?page=",$packageds->getTotalPages())?>
<?php require_once './parts/backofficefooter.php'; ?>