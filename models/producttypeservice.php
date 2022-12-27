<?php require_once 'db_connection.php';?>
<?php require 'producttype.php';?>
<?php
$conn = OpenCon();
$result = mysqli_query($conn,"SELECT * FROM type_products");

?>


  <?php
    while($types = mysqli_fetch_array($result)) {   
        
    }
   
    CloseCon($conn);

    ?>
<?php
class DBproducttypeService {
    

    private function convertproducttype($row) {
        return new producttype ($row['type_products_id'],$row['name'], $row['description']);
    }

    public function getAllProductsType() {
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT * FROM type_products");
        $stmt->bind_param('sss', $type_products_id,$name,$description);
        $result = $stmt->execute();
        $types = [];
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($types, $this->convertproducttype($row));
            }            
        }

        $stmt->close();
        CloseCon($conn);
        return $types;
        
    }
}

?>
