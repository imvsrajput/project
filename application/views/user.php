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
		<?=$p?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>Title</th>
					<th>Price</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lists as $key => $value): ?>
				<tr>
					<th><?=$value['list_id']?></th>
					<th><?=$value['Title']?></th>
					<th><?=$value['Price']?></th>
					<th><?=$value['Description']?></th>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?=$p?>
	</div>

</body>
</html>