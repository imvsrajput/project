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
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Title</th>
				<th>Price</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($lists as $key => $value): ?>
			<tr>
				<th><?=$value['list_id']?></th>
				<th><?=$value['Title']?></th>
				<th><?=$value['Price']?></th>
				<th><?=$value['Description']?></th>
				<th>
					<a href="<?=base_url('vendor/addList/'.$value['list_id'])?>">Edit</a>
					<a href="#" onclick="del($(this),<?=$value['list_id']?>)">Delete</a>
				</th>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<?=$p?>
</div>

<script type="text/javascript">
	function del(obj,id){
		if(confirm('Are you sure to delete this item?')){
			obj.closest('tr').empty();
			$.ajax({
				type:'GET',
				url:'<?=base_url('vendor/dellist/')?>'+id
			});
		}
	}
</script>

</body>
</html>