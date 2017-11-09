<?php require_once('templates/top.php');
if($_GET['id']){
	$id = (int)$_GET['id'];
}else{
	$id=0;
}
$query ="SELECT * FROM products WHERE id=$id";
 
$adr = mysqli_query($db_con,$query);
if(!$adr){
	exit('error');
}
$product = mysqli_fetch_array($adr);
if($_POST){
	if($_FILES){
		$picture=$_FILES['picture']['name'];
	}else {
		
	}
	$query = "UPDATE products
	SET name='$pname',body='$pbody'
	WHERE id = $id AND user_id=".$_SESSION['user_id'];
	$adr = mysqli_query($db_con,$query);
	if(!$adr){
	exit('error');
}
?>
<script>
document.location.href='prodedit.php?id=<? echo $id?>'
</script>
<?php
	
}

?>
<form action="prodedit.php?id=<? echo $id?>">
<input type="text" name="text" value="<? echo$product['name']?>" />
<textarea name="body">
<? echo $product['body']?>
</textarea>
<select>
<option 
<?($products['catalog_id'] ==$cats['id'])?'selected':''?>>
text</option>
</select>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php require_once('templates/bottom.php'); ?>