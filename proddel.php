<?php require_once('config/config.php');
if($_SESSION['user_id']){
if($_GET['id']){
$id=(int)$_GET['id'];
}else{
	$id = 0;
}
$query ="SELECT * FROM products WHERE id=$id";
$adr=mysqli_query($db_con,$query);
if(!$adr){
	exit('error');
}
$pic=mysqli_fetch_array($adr);
if($pic['picture']){
	$file='/uploads/'.$pic['picture'];
	//echo $file;
	if(file_exists($file)){
		@unlink($file);//удаление файлов в пхп это функция унлинк
	}
}
$query= "DELETE  FROM products WHERE id=$id AND user_id=".$_SESSION['user_id'];
$adr=mysqli_query($db_con,$query);

if(!$adr){
	exit('error');
}
header('location: cabinet.php');
}
?>