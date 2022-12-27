<?php require_once './parts/backofficeheader.php'; ?>

<?php require './models/productservice.php';?>
<?php $productService = new DBProductService();
$products = $productService->getProducts(getPage());
?>


  

 <?php
    foreach($products->getItems() as $product) {
	?>
	<div class="row">
  <div class="column1" style="background-color:#cccccc;">
		
					
		<div class="clearfix"></div>

	
			
					<p><h2><?php echo $product->getname(); ?></p>
					<br>
					Preço: <?php echo $product->getprice(); ?>€
					<br>
					<?php echo $product->getcomposition(); ?>
					</h2>
					<br>
					<right><a class = "button1" type="submit" href="product_detail.php?id=<?php echo $product->getid()?>">Detalhes</a><br></right>
					<hr/>
					
	
		</div>
</div>
    <?php
    }
	?>
	<?php getpagination("/product_list.php?page=",$products->getTotalPages())
?>
  </div>
</div>
<div class="clear"></div>
        
        <?php require_once './parts/backofficefooter.php'; ?>


        
        