<?php require_once 'db_connection.php';?>
<?php require 'Product.php';?>
<?php require 'PagedList.php'; ?>

<?php
class DBProductService {

    static $LIMIT = 12;

    private function convertProduct($row) {
 
        return new Product($row['products_id'], $row['name'], $row['price'], $row['quantity'], $row['img'], $row['composition'], $row['color'], $row['weight'], $row['date_added'],$row['type_products_id']);
    }

    public function getProductsByCategory($productType,$page=1) {
        $offset = ($page - 1) * DBProductService::$LIMIT;
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM products where type_products_id = ? AND deleted=0 ORDER BY date_added DESC LIMIT ?,?");
        $stmt->bind_param('ddd',$productType, $offset , DBProductService::$LIMIT);
    
        $result = $stmt->execute();
        $products = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($products, $this->convertProduct($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return new PagedList($products, ceil($this->getTotalProducts($productType) / DBProductService::$LIMIT));
    }
/*
    public function getProductsByCategory($productType) {
        return $this->aux("SELECT * FROM products where type_products_id = ?", function($stmt) {
            $stmt->bind_param('d', $productType);
        }, function($row) {
            $this->convertProduct($row);
        });
    }

    public function getProducts() {
        return $this->aux("SELECT * FROM products", function($stmt) {
        },function($row) {
            $this->convertProduct($row);
        });
    }

    private function aux($query, $bindFunc, $convert) {
        $conn = OpenCon();
        $stmt = $conn->prepare($query);
        $bindFunc($stmt);
        $result = $stmt->execute();
        $items = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($items, $convert($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return $items;
    }
*/
    public function getProducts($page=1) {
        $offset = ($page - 1) * DBProductService::$LIMIT;

        $conn = OpenCon();
      
        $stmt = $conn->prepare("SELECT * FROM products WHERE deleted=0 ORDER BY date_added DESC LIMIT ?,? ");
        $stmt->bind_param('dd', $offset , DBProductService::$LIMIT);
        $result = $stmt->execute();
        $products = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($products, $this->convertProduct($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        
        return new PagedList($products, ceil($this->getTotalProducts() / DBProductService::$LIMIT));
        
    }

    private function getTotalProducts($productType=null) {
        $conn = OpenCon();
      if($productType){
        $stmt = $conn->prepare("SELECT count(products_id) as count FROM products WHERE type_products_id = ? AND deleted=0;");
        $stmt->bind_param('d', $productType);
      }
      else {
        $stmt = $conn->prepare("SELECT count(products_id) as count FROM products WHERE deleted=0;");   
      }

        $result = $stmt->execute();
        $count = 0; 
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            $count = $resultList->fetch_assoc()["count"];            
        }
        $stmt->close();
        CloseCon($conn);
        return (int)$count;
    }

    public function getProduct($id) {

    }
    
    public function postproduct($name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id) {
        return $this->insertproduct ($name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id);
    }


        private function insertproduct($name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id){
     
        $conn=  OpenCon();
    
        $stmt = $conn->prepare( "INSERT INTO products (name, price, quantity, composition, color, weight, img, type_products_id) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssss',$name,$price,$quantity,$composition,$color,$weight,$img,$type_products_id);
        $result = $stmt->execute();
        $newproduct = false;
        if ($result) {
            $newproduct = true;
        }
        $stmt->close();
        CloseCon($conn);
        return $newproduct;
    }
    public function updateproduct($product_id, $name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id) {
        $product = $this->getProducts($product_id);
        if($product == null) {
            return null;
        } 


        return $this->update_product($product_id, $name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id);
        }
    
    private function update_product($products_id, $name, $price,$quantity,$composition,$color,$weight,$img,$type_products_id){
     
        $conn=  OpenCon();
    
        $stmt = $conn->prepare( "UPDATE products SET name=?, price=?, quantity=?, composition=?, color=?, weight=?, img=?, type_products_id=?  WHERE products_id =?") ;
        $stmt->bind_param('sdissssii',$name,$price,$quantity,$composition,$color,$weight,$img,$type_products_id,$products_id);
        $result = $stmt->execute();
        $newproduct = false;
        if ($result) {
            $newproduct = true;
        }
        $stmt->close();
        CloseCon($conn);
        return $newproduct;

    }




    public function getProductByid($products_id) {
        $conn = OpenCon();
      
        $stmt = $conn->prepare("SELECT * FROM `products`  where products_id = ? AND deleted=0 ");
        $stmt->bind_param('d', $products_id);
        $result = $stmt->execute();
        $row = null;
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            $row = $resultList->fetch_assoc();      
            }            
       

        $stmt->close();
        CloseCon($conn);
        return $this->convertProduct($row);
    }
    public function deleteproducts($product_id){
    $conn=  OpenCon();
    
        $stmt = $conn->prepare( "UPDATE products SET deleted=1  WHERE products_id =?") ;
        $stmt->bind_param('d',$product_id);
        $result = $stmt->execute();
        $newproduct = false;
        if ($result) {
            $newproduct = true;
        }
        $stmt->close();
        CloseCon($conn);
        return $newproduct;

    }
} 


?>
    