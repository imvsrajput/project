<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'common.js.php';?>
</head>
<body>
<?php include'nav.php'; ?>

<div class="container">
		<div class="card text-center">
		  <div class="card-header">
		    <?=$user['name']?>
		  </div>
		  <div class="card-body">
		    <h5 class="card-title"><?=$user['email']?> <?=$user['mobile']?></h5>
		    <p class="card-text"></p>
		    <a href="#" class="btn btn-primary">Go somewhere</a>
		  </div>
		  <div class="card-footer text-muted">
		    <?=$user['created_at']?>
		  </div>
		</div>
</div>

</body>
</html>