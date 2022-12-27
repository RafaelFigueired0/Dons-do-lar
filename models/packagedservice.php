<?php require_once 'db_connection.php';?>
<?php require 'packaged.php';?>
<?php require 'packaged_detail.php';?>
<?php require 'packaged_product.php';?>
<?php require 'PagedList.php'; ?>
<?php
class DBPackagedService {
    
    static $LIMIT = 12;


    private function convertPackaged($row) {
        return new Packaged($row['packaged_id'], $row['users_id'], $row['price'],$row['state']);
    }
    private function convertPackagedDetail($detail,$list) {
        return new PackagedDetail($detail['packaged_id'], $detail['users_id'],$detail['name'], $detail['price'],$detail['state'],$list);
    }
    private function convertPackagedProduct($row) {
        return new PackagedProduct($row['products_id'], $row['name'], $row['price'],$row['quantity']);
    }

    public function getPackages($page=1) {
        $offset = ($page - 1) * DBPackagedService::$LIMIT;
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM `order` ORDER BY state , date_added DESC LIMIT ? , ?");
        $stmt->bind_param('dd', $offset , DBPackagedService::$LIMIT);
        $result = $stmt->execute();
        $packageds = []; 
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($packageds, $this->convertPackaged($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return new PagedList($packageds, ceil($this->getTotalpackageds() / DBPackagedService::$LIMIT));
    }

    private function getTotalpackageds() {
        $conn = OpenCon();
          
        $stmt = $conn->prepare("SELECT count(packaged_id) as count FROM `order`;");   
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
    
    public function getPackagedByuserid($userpackaged) {
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM `order`  where users_id = ? ");
        $stmt->bind_param('d', $userpackaged);
        $result = $stmt->execute();
        $packageds = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($packageds, $this->convertPackaged($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return $packageds;
    }
    public function getPackagedByid($packaged_id) {
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM `order` INNER JOIN users  ON `order`.users_id = users.users_id where packaged_id = ? ");
        $stmt->bind_param('d', $packaged_id);
        $result = $stmt->execute();
        $packagedrow = null;
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
            $packagedrow = $row;
            }            
        }
        
        $stmt->close();
        $stmt = $conn->prepare("SELECT `order_products`.*, products.name FROM `order_products` INNER JOIN products on products.products_id=`order_products`.products_id where packaged_id = ? ");
        $stmt->bind_param('d', $packaged_id);
        $result = $stmt->execute();
        $products = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($products, $this->convertPackagedProduct($row));
      
            }            
        }
        
        $stmt->close();
        CloseCon($conn);
        return $this->convertPackagedDetail($packagedrow,$products);;
    }
    public function getcart($cart){
        $ids = "";
            for($i = 0; $i < count($cart); $i++) {
                $ids .= $cart[$i]->getid();
                if($i + 1 < count($cart)) {
                    $ids .= ",";
                }
            }
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM products where products_id in ($ids);");
        $result = $stmt->execute();
        $packageds = []; 
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                $quantity = $this->getquantity($cart,$row['products_id']);
                array_push($packageds, new PackagedProduct($row['products_id'], $row['name'],$row['price'],$quantity));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return $packageds;

    }
    private function getquantity($cart,$id){
        foreach ($cart as $item){
            if($item->getid() === $id)
                return $item->getquantity();
        }
        return null;
    }
     public function createpackaged($cart,$users_id){
        $cart = $this->getcart($cart);
        $totalprice= 0;
        foreach ($cart as $item){
            $totalprice += $item->getquantity()*$item->getprice();
        }
        $conn=  OpenCon();
    
        $stmt = $conn->prepare( "INSERT INTO `order` (price,users_id) VALUES (?,?)");
        $stmt->bind_param('dd',$totalprice,$users_id);
        $result = $stmt->execute();
        $newpackagedid = null;
        if ($result) {
            $newpackagedid = $stmt->insert_id;
        }
        $stmt->close();
        CloseCon($conn);
      
   foreach($cart as $item)
   {$conn=  OpenCon();
       $product_id=$item->getproduct_id();
       $price=$item->getprice();
       $quantity=$item->getquantity();
        $stmt = $conn->prepare( "INSERT INTO order_products (products_id, packaged_id,price , quantity) VALUES (?,?,?,?)");
      
        $stmt->bind_param('dddd',$product_id ,$newpackagedid , $price, $quantity);
        $result = $stmt->execute();
  
        $stmt->close();
    }
 
        CloseCon($conn);
        return $this->getPackagedByid($newpackagedid);
     }

     public function update_state($packaged_id,$state){
     
        $conn=  OpenCon();
        $stmt = $conn->prepare( "UPDATE `order` SET state = ?  WHERE packaged_id = ?") ;
        $stmt->bind_param('sd', $state,$packaged_id);
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
