<?php require './parts/header.php';?> 
<?php require './models/productservice.php';?>

<?php
    $product =  $productService->getProducts($_GET["search"],1,12);
    foreach($products as $product) {
    ?>    
    <div class="agile_top_brands_grids">
					
                    <div  class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                            <a href=""><img title=" " alt=" " src="<?php echo $product->getimg(); ?>" width= "400px" height="300px"></a>		
                                            <p><?php echo $product->getname(); ?></p>
                                            <h4>Preço: <?php echo $product->getprice(); ?>€</h4>
                    <h4><?php echo $product->getquantity(); ?>	</h4>
                    <div class="snipcart-details top_brand_home_details">
                    <form action="#" method="post">
                                                <fieldset>
                                                <input type="submit" name="submit" value="Adicionar ao carrinho" class="button">
                                                </fieldset>
                                            </form>
                               </figure>
                            </div>
                        </div>
                    </div>
                </div>

<?php
}
?>
    
    
    
    <?php require './parts/footer.php';?> 