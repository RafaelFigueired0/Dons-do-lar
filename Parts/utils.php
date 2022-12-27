<?php
function getPage() {
    return array_key_exists('page', $_GET) ? htmlspecialchars($_GET['page']) : 1;
}

function getid() {
    return htmlspecialchars($_GET['id']);
}


function redirectTo($redirectUrl) {
	echo '<script type="text/javascript"> window.location.href="'. $redirectUrl .'";</script>';
}

function is_admin(){
    if(array_key_exists('role', $_SESSION)){
        return $_SESSION['role'] === 'admin';
    }
    return false;
} 

function ensure_admin(){
    if (!is_admin()){
        header('HTTP/1.0 404 Not Found', true, 404);
        die();
    }
}

function is_login(){
    return (array_key_exists('role', $_SESSION));
}
function ensure_is_login(){
    if (!is_login()){
        header('HTTP/1.0 404 Not Found', true, 404);
        die();
    }
}
function getpagination($url,$total){ 
   $result = '<center><ul class="pagination" >';
		for ($i = 1; $i <= $total; $i++) {
	$result .= '<li class="page-item">';
    $result .= '<a href="'. $url . $i.'">' . $i .'</a>';
    $result .= '</li>';
  
 } 
 $result .= '</ul></center>';
echo $result;
}
?>
