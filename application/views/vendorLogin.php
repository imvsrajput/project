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
	    <label for="mobile">Mobile no.</label>
	    <input type="number" class="form-control" id="mobile" name="mobile" required="true" placeholder="Enter Mobile">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" required="true" id="password" name="password" placeholder="Password">
	  </div>
	  <span></span><br>
	  <button type="submit" class="btn btn-primary">Submit</button>
		<a href="<?=base_url('vendor/registration')?>" class="btn btn-info">Registration</a>
	</form>
</div>
<script type="text/javascript">
	$('form').submit(function (e) {
		$('span').html('');
		e.preventDefault();
		var formObj = {};
		$('.form-control').each(function(){
			formObj[$(this).attr('id')] = $(this).val();
		});
		$.ajax({
			type:"POST",
			data:formObj,
			dataType: "json",
			url:'<?=base_url('vendor/login')?>',
			success:function(rsp){
				$('span').html(rsp.Message);
				if(rsp.Status===1){
					$(window).attr('location','<?=base_url('vendor')?>')
				}
			}
		});
	});
</script>
</body>
</html>