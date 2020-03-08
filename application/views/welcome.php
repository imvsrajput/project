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
	<div class="row">
	  <div class="col-sm-6">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Users</h5>
	        <p class="card-text">Login with Username and password</p>
	        <a href="<?=base_url('user/registration')?>" class="btn btn-primary">Registration</a>
	        <a href="<?=base_url('user/login')?>" class="btn btn-primary">Login</a>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Shopkeeper</h5>
	        <p class="card-text">Login with mobile no. and password</p>
	        <a href="<?=base_url('vendor/registration')?>" class="btn btn-primary">Registration</a>
	        <a href="<?=base_url('vendor/login')?>" class="btn btn-primary">Login</a>
	      </div>
	    </div>
	  </div>
	</div>
</div>
</body>
</html>