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
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="Title" name="Title" required="true" placeholder="Enter Title" value="<?=$list['Title']?>">
	  </div>
	  <div class="form-group">
	    <label for="Price">Price</label>
	    <input type="number" class="form-control" required="true" id="Price" name="Price" placeholder="Price" value="<?=$list['Price']?>">
	  </div>
	  <div class="form-group">
	    <label for="Price">Description</label>
		<textarea name="Description" id="Description" class="form-control" placeholder="Description"><?=$list['Description']?></textarea>
	  </div>
	  <span></span><br>
	  <input type="hidden" class="form-control" name="list_id" id="list_id" value="<?=$list['list_id']?>">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<script type="text/javascript">
	var inputData = JSON. parse('<?=json_encode($list,true)?>');
	for(var x in inputData){
		$('#'+x).val(inputData[x]);
	}
	$('form').submit(function(e){
		e.preventDefault();
		formObj={};
		$('.form-control').each(function(){
			formObj[$(this).attr('id')]=$(this).val();
		});
		$.ajax({
			type:"POST",
			data:formObj,
			dataType: "json",
			url:'<?=base_url('vendor/addList')?>/'+formObj['list_id'],
			success:function(rsp){
				$('span').html(rsp.Message);
				if(rsp.Status===1){
					window.history.go(-1);
				}
			}
		});
	});
</script>
</body>
</html>