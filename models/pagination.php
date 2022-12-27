<?php


$per_page =24;//define how many products for a page
$pages = ceil($count/$per_page);

if($_GET['page']==""){
$page="1";
}else{
$page=$_GET['page'];
}
$start    = ($page - 1) * $per_page;
$sql     = $sql." LIMIT $start,$per_page";
$query2=mysql_query($sql);

 ?>   

<ul id="pagination">
        <?php
        //Show page links
        for ($i = 1; $i <= $pages; $i++)
          {?>
          <li id="<?php echo $i;?>"><a href="/outros.php?c=<?php echo $c;?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
          <?php           
          }
        ?>
      </ul>