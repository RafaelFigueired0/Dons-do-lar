<?php require_once './parts/backofficeheader.php'; ?>
<?php require 'models/productservice.php';?>
<?php require_once './models/producttypeservice.php';

$productService = new DBProductService();
$product_types = new DBproducttypeService();
if(!empty($_POST)) {
    
    if(isset($_POST['update'])&& isset($_POST['name']) && isset ($_POST['type_products_id']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['composition'])&& isset($_POST['color'])&& isset($_POST['weight'])&& isset($_POST['img'])) {
     
      
        $productService->updateproduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['quantity'],$_POST['composition'],$_POST['color'],$_POST['weight'],$_POST['img'],$_POST['type_products_id']);  
        
    } else if (isset($_POST['delete'])) {
        if ($productService->deleteproducts(getid())){
            redirectTo("/product_list.php");
        }

    }

}   
$productx= $productService->getProductByid(getid());


?>
 <form name = "form1"  method = "post"  >    
 <input type = "hidden" name = "id" value = "<?php echo $productx->getid()?>" required/>
            <div class = "container">    
                <div class = "form_group">    
                    <label>Nome do produto:</label>    
                    <input type = "name" name = "name" value = "<?php echo $productx->getname()?>" required/>    
                </div>    
                <div class = "form_group">    
                    <label>preço:</label>    
                    <input type = "number" name = "price" value = "<?php echo $productx->getprice()?>" required />    
                </div>    
                <div class = "form_group">    
                    <label>Quantidade:</label>    
                    <input type = "number" name = "quantity" value = "<?php echo $productx->getquantity()?>" />    
                </div>    
                <div class = "form_group">    
                    <label>Composição:</label>    
                    <input type = "text" name = "composition" value = "<?php echo $productx->getcomposition()?>" />    
                </div>  
                <div class = "form_group">    
                    <label>Cor:</label>    
                    <input type = "text" name = "color" value = "<?php echo $productx->getcolor()?>" />    
                </div>    
                <div class = "form_group">    
                    <label>Peso:</label>    
                    <input type = "number" name = "weight" value = "<?php echo $productx->getweight()?>" />    
                </div>    
                <div class = "form_group">
                    <label>Imagem:</label>    
                    <input type = "url" name = "img" value = "<?php echo $productx->getimg()?>" />    
                </div>    
                <div class = "form_group">    
                    <label for="category">categoria:</label>    
                    <select id="category" name="type_products_id">
                        <?php foreach($product_types->getAllProductsType() as $product_type)  { 
                            if($productx->gettype_products_id() ==  $product_type->gettype_products_id()) {?>
                                <option selected="selected" value="<?php echo $product_type->gettype_products_id()?>"> <?php echo $product_type->getnome() ?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $product_type->gettype_products_id()?>"> <?php echo $product_type->getnome() ?></option>
                            <?php 
                            }
                            
                            
                        } ?>
                    </select>
                      </div>      
                       <br>
                      <br>
                        <button  class = "button1" name="update" type="submit">Atualizar</button>
              <form method = "post">
                  <button class = "button1" name="delete" type="submit"> Apagar</button>
              </form>
            </div>  
          
        </form>    
 
<?php require_once './parts/backofficefooter.php'; ?>