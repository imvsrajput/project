<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?=base_url('')?>">imvs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['vendor_id'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('vendor/lists')?>">All Lists</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('vendor/addList')?>">Add List</a>
      </li>
      <?php endif ?>
    </ul>
    <span class="navbar-text">
      <?php 
      if (isset($_SESSION['vendor_id'])) {
        echo $this->db->where('user_id',$_SESSION['vendor_id'])->get('users')->first_row()->name;
      }elseif (isset($_SESSION['user_id'])) {
        echo $this->db->where('user_id',$_SESSION['user_id'])->get('users')->first_row()->name;
      } 
      ?>
    </span>
  </div>
</nav>