<?php require_once 'db_connection.php';?>
<?php require 'clientes.php';?>
<?php require 'PagedList.php'; ?>
<?php
class DBclientesService {
    
    static $LIMIT = 12;

    private function convertclients($row) {
        return new clients ($row['email'], $row['name'], $row['password'], $row['phone']);
    }

    public function getclients($page=1) {
        $offset = ($page - 1) * DBclientesService::$LIMIT;
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT  * FROM `users` ORDER BY `name` DESC LIMIT ? , ?");
        $stmt->bind_param('dd', $offset , DBclientesService::$LIMIT);
        $result = $stmt->execute();
        $clients = []; 
        if (!$stmt->errno) {
            $resultList = $stmt->get_result();
            while($row = $resultList->fetch_assoc()) { 
                array_push($clients, $this->convertclients($row));
            }            
        }
        $stmt->close();
        CloseCon($conn);
        return new PagedList($clients, ceil($this->getTotalclients() / DBclientesService::$LIMIT));
    }



    private function getTotalclients() {
        $conn = OpenCon();
          
        $stmt = $conn->prepare("SELECT count(users_id) as count FROM `users`;");   
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
}