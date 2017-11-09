<?php
require_once('templates/top.php');
if(isset($_GET['url'])){
	$url=$_GET['url'];
}else {
	$url='index';
}
$id=(int)$_GET['id'];
$query="SELECT*FROM catalogs WHERE id=$id";
$adr=mysqli_query($db_con,$query);
if(!$adr){
	 exit($query);
}
$tbl_catalogs=mysqli_fetch_array($adr);//функция,на выходе получаем массив
/*echo"<pre>";
print_r($tbl_maintext);
echo"</pre>";*/

?>



<div class="col-lg-9">
	<h2><?=$tbl_catalogs['name'];?>
	</h2>
	<?=$tbl_catalogs['body']?>
		  </div>
          
<?php require_once ('templates/bottom.php')?>