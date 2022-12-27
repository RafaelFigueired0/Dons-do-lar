<?php require_once './parts/backofficeheader.php'; ?>
<?php require_once './models/producttypeservice.php';
require_once './models/productservice.php';
$newproducts = new DBProductService();
$product_types = new DBproducttypeService();

if(!empty($_POST)) {
    
    if(isset($_POST['name']) && isset ($_POST['type_products_id']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['composition'])&& isset($_POST['color'])&& isset($_POST['weight'])&& isset($_POST['img'])) {
     
        $newproduct = $newproducts->postproduct($_POST['name'], $_POST['price'], $_POST['quantity'],$_POST['composition'],$_POST['color'],$_POST['weight'],$_POST['img'],$_POST['type_products_id']);  
        if($newproduct ) {
            redirectTo("/add_product.php");
        }        
    }
}   
?>
    <body>    
        <link href = "style.css" type = "text/css" rel = "stylesheet" />    
        <br><br><h2><center>Adicionar produtos novos:</h2>    
        <br>
        <form name = "form1" action="/add_product.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Nome do produto:</label>    
                    <input type = "name" name = "name" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>preço:</label>    
                    <input type = "number" name = "price" value = "" required />    
                </div>    
                <div class = "form_group">    
                    <label>Quantidade:</label>    
                    <input type = "number" name = "quantity" value = "" />    
                </div>    
                <div class = "form_group">    
                    <label>Composição:</label>    
                    <input type = "text" name = "composition" value = "" />    
                </div>  
                <div class = "form_group">    
                    <label>Cor:</label>    
                    <input type = "text" name = "color" value = "" />    
                </div>    
                <div class = "form_group">    
                    <label>Peso:</label>    
                    <input type = "number" name = "weight" value = "" />    
                </div>    
                <div class = "form_group">
                    <label>Imagem:</label>    
                    <input type = "url" name = "img" value = "" />    
                </div>    
                <div class = "form_group">    
                    <label for="category">categoria:</label>    
                    <select id="category" name="type_products_id">
                        <?php foreach($product_types->getAllProductsType() as $product_type)  { ?>
                            <option value="<?php echo $product_type->gettype_products_id() ?>"> <?php echo $product_type->getnome()?></option>
                       <?php  } ?>
                    </select>
                    <br>
                    <br>
                    <button  class = "button1" type="submit">Inserir</button>
                </div>      
            </div>  
          
        </form>    
        
        <?php require_once './parts/backofficefooter.php'; ?>


        
        