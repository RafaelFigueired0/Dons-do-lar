
<?php require_once 'Parts/header.php';?>
<?php require 'models/cart_item.php';?>
<?php require 'models/packagedservice.php';?>
<?php $packagedService = new DBpackagedService();
if(isset($_POST["order"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);

    $cart_data = [];
    foreach(json_decode($cookie_data, true) as $cart_item) {
   array_push($cart_data,new CartItem((int)$cart_item['item_id'],(int)$cart_item['item_quantity']));
    } 
   $packaged = $packagedService->createpackaged($cart_data,$_SESSION['users_id']); 
   echo '<script> document.cookie = "shopping_cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; </script>';
   redirectTo("/packaged_detail_cs.php?id=".$packaged->getpackaged_id());
    die();
 }
}
else if (isset($_POST["cart_clear"]))
{
    echo '<script> document.cookie = "shopping_cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; </script>';  
    redirectTo("/cart.php");
}
 ?>
 
<?php 
if (isset($_COOKIE['shopping_cart'])){


 $cookie_data = stripslashes($_COOKIE['shopping_cart']);

 $cart_data = [];
 foreach(json_decode($cookie_data, true) as $cart_item) {
array_push($cart_data,new CartItem((int)$cart_item['item_id'],(int)$cart_item['item_quantity']));
 }  
 

$cart_items = $packagedService->getcart($cart_data);
foreach ($cart_items as $cart_item){
?>
<div class="row">
  <div class="column1" style="background-color:#cccccc;">
  <br>
   <h2> Produtos: <?php echo $cart_item->getname()?><br>
    Quantidade: <?php echo $cart_item->getquantity()?><br>
    Preço individual: <?php echo $cart_item->getprice()?>€<br>
    Preço total: <?php echo $cart_item->getquantity() * $cart_item->getprice()?>€</h2>
    <br>
    <hr>
    </div>
</div>
<?php } 
?>
<div>
<form  method="POST">
    <button class = "button1" name="order" type="submit">encomendar</button>
    
</form>
<form method="POST">    
    <button class= "button1" name = "cart_clear" > Apagar carrinho</button>
</form>
 
</div>
<?php } 
else {
?>
<h2>Carrinho vazio</h2>
<?php }?>
<?php require_once 'parts/footer.php';?>