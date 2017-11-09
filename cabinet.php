<?php require_once('templates/top.php');

if($_SESSION['user_id']){
	
	if($_POST){
	$pname=$_POST['name'];
	$pbody=$_POST['body'];
	$pcatalog_id=(int)$_POST['catalog_id'];
	if($_FILES){
		$_FILES['picture']['type'];
		//echo "<pre>";
		//print_r($_FILES);
		//echo "<pre>";
		$file_name_tmp=$_FILES['picture']['tmp_name'];
		$dir = '/uploads/';
		$file_new_name=$_SERVER['DOCUMENT_ROOT'].$dir;
		//$picture=$_FILES['picture']['name'];
		$picture=date('y_m_d_h_i_s').'.jpg';//формирует название файла и делает его название датой
		if(move_uploaded_file($file_name_tmp, $file_new_name.$picture)){
			$ok = true;
		}
	}else{
		$picture = 'no file';
		echo "no file";
	}
	$query="INSERT INTO products VALUES(
	NULL,
	'$pname',
	'$pbody',
	'$picture',
	'-',
	0,
	NOW(),
	'-',
	'".date('ymdhis')."',
	'new',
	$pcatalog_id,
	".$_SESSION['user_id']."
	
	)";
	//echo $query;
	$adr=mysqli_query($db_con,$query);
	if(!$adr){
		exit('error');
	}
	?>
	<script>
	//document.location.href="cabinet.php";
	</script>
	<?php
	
}
	?>
	<form action="cabinet.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
   <textarea name="body">Body</textarea>
   <p class="help-block">Desription here.</p>
  </div>
  <div class="form-group">
    <label for="file">File input</label>
    <input type="file" id="picture" name="picture">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="form-group">
  <label for="picture">Category</label>
			<select class="form-control" name="catalog_id">
				  
				 <?php
					$query = "SELECT * FROM catalogs";
					$adr=mysqli_query($db_con,$query);
					if(!$adr){
						exit('error');
					}
					while($cats = mysqli_fetch_array($adr)){
						?>
						<option value="<?php echo $cats['id']?>"><?php echo $cats['name']?></option>
						<?php
					}
				 ?>
			</select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<table width=100% class="table table-bordered">
<tr>
<td>Photo</td>
<td>Name</td>
<td>Price</td>
<td>Action</td>
</tr>
<?php
$query = "SELECT * FROM products WHERE user_id=".$_SESSION['user_id'];
$adr=mysqli_query($db_con,$query);
if(!$adr){
	exit('error');
}
while($prod=mysqli_fetch_array($adr)){
	?>
<tr>
<td width="200px">
<?
if($prod['picture'] !=""){
	$pic='/uploads/'.$prod['picture'];
	
}else{
	$pic='/media/img/no_photo.jpg';
}
$id=(int)$prod['id'];
?>
<img src="<?echo $pic?>" width=100% class="pic"/>



</td>
<td><?php echo $prod['name']?></td>
<td><?php echo $prod['price']?></td>
<td class="action">
<a href="prodedit.php?id=<?php echo $id;?>" class="btn btn-success btn-blok edit">Редактировать</a>
<a href="#" class="btn btn-warning btn-blok delete" onClick="delete_position('proddel.php?id=<?php echo $id?>','Вы действительно хотите удалить этот товар?')" class="delete">Удалить</a>
</td>
</tr>
<?	
}
 ?>
</table>
	<?
	
}else{
	?>
	<div class="error">Error exit</div>
	<?
	
}
?>


<?php require_once ('templates/bottom.php')?>