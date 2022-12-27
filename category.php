<?php 
if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["product_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["product_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
  }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["product_id"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
}
?>
<?php require './parts/header.php';?> 
<?php require './models/productservice.php';?>
<?php $productService = new DBProductService();
$productType = (int)$_GET["id"];
$products = $productService->getProductsByCategory($productType);
?>

<div class="products">
	<div class="container">
		<div class="col-md-4 products-left">
		
					
		<div class="clearfix"></div>
	</div>
</div>
			
 <?php
    foreach($products->getItems() as $product) {
    ?>
<div class="agile_top_brands_grids" >
	
					
	<div  class="hover14 column1">
		<div class="agile_top_brand_left_grid">
			<div class="agile_top_brand_left_grid_pos">
			</div>
			<div class="agile_top_brand_left_grid1">
				<figure>
					<a href=""><img title=" " alt=" " src="<?php echo $product->getimg(); ?>" width= "400px" height="300px"></a>		
					<p><h3><center><?php echo $product->getname(); ?></center></h3></p>
					<br>
					<h4>Preço: <?php echo $product->getprice(); ?>€</h4>
					<br>
					<h4><?php echo $product->getcomposition(); ?></h4>
					<br>
					<h4> quantidade de produtos para adicionar ao carrinho</h4>
					<br>
					<form method="POST">
					<input type="number" min="1" name="quantity" class ="" style="margin-left:150px" value="1"/>
					<input type="hidden" name="product_id" class ="" value="<?php echo $product->getid();?>"/>
					<br>
					<input type="submit" name="add_to_cart" style ="margin-top:5px; margin-left:160px" value="Adicionar ao carrinho" class="btn btn-success">
					</form>
				</figure>
			</div>
		</div>
	</div>

</div>
    <?php
    }
	?> 
	<?php  $id= getid();
	 getpagination("/category.php?id={$id}&page=",$products->getTotalPages());
?>
  </div>
</div>
<div class="clear"></div>
  
    <?php require './parts/footer.php';?> 