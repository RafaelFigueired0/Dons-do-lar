<?php
require_once "IUserService.php";
require_once "User.php";
?>

<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = getenv('DB_PASSWORD');
 $db = "Dons_do_lar";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 $conn->set_charset("utf8");
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
class DbUserService implements IUserService {

    public function getUser($email) {
        $conn = OpenCon();
        $stmt = $conn->prepare("SELECT  users_id, email, name ,  phone, password, date_added, updated_at, role FROM users where email = ?");
        $stmt->bind_param('s', $email);
        $result = $stmt->execute();
        $user = null;
        if (!$stmt->errno) {
            $stmt->bind_result($users_id , $email, $name, $phone, $password, $date_added, $updated_at, $role);
            $stmt->fetch();
            if($email != null) { 
                $user = new User($users_id , $email, $name, $phone, $password, $date_added, $updated_at, $role);
            }
        }
        $stmt->close();
        CloseCon($conn);
        return $user;
    }
    
    public function postUser($email, $name, $password, $phone) {
        return $this->getUser($email) != null ? null : $this->insertUser($email, $name, password_hash($password, PASSWORD_DEFAULT), $phone);
    }

    public function validatePassword($email, $password) { 
        $user = $this->getUser($email);
        if($user == null) {
            return false;
        }
        
        return password_verify($password, $user->getPassword());
    }


    private function insertUser($email, $name, $password, $phone) {
        $conn = OpenCon();
        $stmt = $conn->prepare("INSERT INTO users (email, name, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $email, $name, $password, $phone);
        $result = $stmt->execute();
        $user = null;
        if ($result) { 
            $user = $this->getUser($email);
        }
        $stmt->close();
        CloseCon($conn);
        return $user;
    }
    

    public function UpdateUser($email, $name,$phone) {
    $user = $this->getUser($email);

    if($user == null) {
        return null;
    } 


    return $this->UptadeUserPrivate($email, $name, $phone, $user->getPassword());
    }

    private function UptadeUserPrivate($email, $name, $phone, $password) {
    $conn = OpenCon();
    $stmt = $conn->prepare("UPDATE Users SET name = ?, phone = ?, password=? WHERE email=?");
    $stmt->bind_param('ssss', $name, $phone, $password, $email,);
    $result = $stmt->execute();
    $user = null;
    if ($result) {
        $user = $this->getUser($email);
    }
    $stmt->close();
    CloseCon($conn);
    return $user;
    }
}
?>
