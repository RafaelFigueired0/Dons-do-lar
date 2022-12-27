<?php require_once './parts/backofficeheader.php'; ?>
<?php require_once './models/producttypeservice.php';
require_once './models/productservice.php';
$productService = new DBProductService();
$product_types = new DBproducttypeService();
$products = $productService->getProducts($page=1);

if(!empty($_POST)) {
    if(isset($_POST['name']) && isset ($_POST['products_id']) && isset ($_POST['type_products_id']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['composition'])&& isset($_POST['color'])&& isset($_POST['weight'])&& isset($_POST['img'])) {
        
            $newproduct = $newproducts->postproduct($_POST['products_id'],$_POST['name'], $_POST['price'], $_POST['quantity'],$_POST['composition'],$_POST['color'],$_POST['weight'],$_POST['img'],$_POST['type_products_id']);  
            if($newproduct != null) {
                header("Location: /add_product.php");
                return;
            }        
    }
}

?>
    <body>    
        <link href = "style.css" type = "text/css" rel = "stylesheet" />    
        <br><br><h2><center>apagar produtos:</h2>    
        <br>
        <form name = "form1" action="/add_product.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">  
            <div class = "form_group">    
                    <label for="produto">Produto:</label>    
                    <select id="produto">
                    <?php
                    
    foreach($products->getItems() as $product) {
        
	?>
                            <option value="<?php echo $product->getid();?>"> <?php echo $product->getname();?></option>
            
              

                       <?php  } ?>
  
                        </select>
                       
                
                          <div class="check">
                        <body onload="disableSubmit()">
                       
                      
                           
 <input type="checkbox"  name="terms" id="terms" class="checkbox" onchange="activateButton(this)">  Confirmar
<br><br>
  <button type="submit" name="submit" id="submit" class="button1" a href="login.php">Apagar</button>
                
                       
                </div>      
            </div>  
          
        </form>    
                    </div>
       

        <script>

function disableSubmit() {
 document.getElementById("submit").disabled = true;
}

 function activateButton(element) {

     if(element.checked) {
       document.getElementById("submit").disabled = false;
      }
      else  {
       document.getElementById("submit").disabled = true;
     }

 }
 
</script>

        
         <?php require_once './parts/backofficefooter.php'; ?>