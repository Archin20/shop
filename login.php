<?php require_once('templates/top.php'); 

	if($_POST){
		
	
	$p_email=$_POST['email'];
	$p_password=$_POST['password'];
	$errors=array();
	
	
	if(!$p_email){
	$errors[]="Поле почты не заполнено";	
	}
	if(!$p_password){
	$errors[]="Поле пароля не заполнено";	
	}
	$query="SELECT * FROM users 
				WHERE email='$p_email'
				AND password='$p_password'";
	$adr=mysqli_query($db_con,$query);
	if(!$adr){
		exit($query);
	}
	$user=mysqli_fetch_array($adr);
	if(empty($user)){
		$errors[]="ошибка входа";
	}
				
	/*$query="SELECT * FROM users WHERE url='$p_email'";
	$adr=mysqli_query($db_con,$query);
	if(!$adr){
		exit($query);
	}
	$already_user=mysqli_fetch_array($adr);
	if(!empty($already_user)){
		$errors[]="Такое мыло уже есть сорри бро";
	}*/
	
	if(!empty($errors)){
		foreach($errors as $error){
			echo "<div class='error red' style='color:red'>";
			echo $error;
			echo "</div>";
		}
	}else{
		/*echo "<div class='error red' style='color:green'>";
		print_r($user);
		echo "</div>";*/
		$_SESSION['user_id']=$user['id'];
		?>
		<script>
		document.location.href="cabinet.php";
		</script>
		<?php
		}
		
		}
		/*?>
		<script>
		document.location.href="login.php";
		</script>
		<?*/
	
	
?>

<form method="post" action="login.php">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">пароль</label>
    <input type="password" class="form-control" id="password" placeholder="password" name="password">
  </div>
  
  
  <button type="submit" class="btn btn-default">отправить</button>
</form>
<?php require_once('templates/bottom.php'); ?>