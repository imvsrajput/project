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
	<form method="POST" style="margin: auto;width: 50%;">
	  <div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Enter Name">
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" id="username" name="username" required="true" placeholder="Enter Username">
	  </div>
	  <div class="form-group">
	    <label for="mobile">Mobile no.</label>
	    <input type="number" class="form-control" id="mobile" name="mobile" required="true" placeholder="Enter Mobile no.">
	  </div>
	  <div class="form-group">
	    <label for="email">email</label>
	    <input type="email" class="form-control" id="email" name="email" required="true" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" required="true" id="password" name="password" placeholder="Password">
	  </div>
	  <span></span><br>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
	<script type="text/javascript">
		$('form').submit(function (e) {
			e.preventDefault();
			var formObj={};
			$('.form-control').each(function(){
				formObj[$(this).attr('id')]=$(this).val();
			});
			$.ajax({
				type:'POST',
				data:formObj,
				url:'<?=base_url('user/registration')?>',
				dataType: "json",
				success:function(rsp){
					$('span').text(rsp.Message);
					if(rsp.Status===1){
						$(window).attr('location','<?=base_url('user/login')?>')
					}
				}
			});
		});
	</script>
</body>
</html>