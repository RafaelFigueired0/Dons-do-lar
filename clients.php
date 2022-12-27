<?php require_once './parts/backofficeheader.php'; ?>
<?php require 'models/clientservice.php';
$clientservice = new DBclientesService();

$client = $clientservice->getclients(getPage());

?>

 <?php
    foreach($client->getitems() as $clients) {
    ?>
<link rel="style.ccs" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="row">
  <div class="column1" style="background-color:#cccccc;">
    <h2>Nome:<?php echo $clients->getname()?><br>
    Email:<?php echo $clients->getemail()?><br>
    Telemóvel:<?php echo $clients->getphone()?>
    <br>
    <hr/>
    </div>
</div>

    <?php }?>
    <?php getpagination("/clients.php?page=",$client->getTotalPages())?>
<?php require_once './parts/backofficefooter.php'; ?>