<?php
if(!defined('SECURE')) exit('<h1>Access Denied</h1>'); ?>
<?php require_once 'mpm/admin/components/header_code.php'; ?>
<?php require_once 'mpm/admin/components/nav.php'; ?>

<div class="container">
  <!-- header -->
  <div class="row sticky-top">
   <nav style="--bs-breadcrumb-divider: '>';background-color:#d36bca;" aria-label="breadcrumb" class=" p-2">
    <ol class="breadcrumb p-0 m-0">
      <li class="breadcrumb-item"><a href="<?php echo reverse('admin_dashboard');?>" class="text-decoration-none" style="color:white;text-decoration:none">Home</a></li>
      <li class="breadcrumb-item active text-muted" aria-current="page"><?php echo $table; ?></li>
    </ol>
   </nav>
</div>
  <!-- header END-->
  
 <div class="row pt-2">
   <div class="col-sm-12">
     <a class="btn btn-primary" href="<?php echo reverse('object_create',array($table)); ?>">+ Add <?php echo $table;?></a>
    </div>
    <div class="col-sm-8 p-0">
    <form class="d-flex m-2" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="button">Search</button>
    </form>
    <form  class="m-2 p-0">
      <div class="input-group">
        <select name="action" id="" class="form-select">
          <option  selected>-- Action --</option>
          <option value="delete">Delete</option>
        </select>
        <button type="button" class="btn btn-primary">Go</button>
      </div>
    </form>
  <div class="card overflow-scroll">
    <table class="table table-striped  table-hover " style="overflow:hidden">
      <thead class="table-primary">
        <tr>
         <th><input type="checkbox" class="form-check-input"/></th>
        <?php
          foreach($table_data['list_display'] as $column){
           echo "<th>".$column."</th>";
          }
        ?>
        </tr>
      </thead>
      <tbody class="tbody table-group-divider   clickRow">
      <?php foreach($rows as $row) { ?>
        <tr id="<?php echo $row[$table_data['list_display'][0]];?>">
          <td><input type="checkbox" class="form-check-input"/></td>
            <?php foreach($table_data['list_display'] as $item){ ?>
            <td><?php echo $row[$item] ?></td>
            <?php } ?>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div><!-- col - sm - 8 -->
    <div class="col-sm-4">
  
</div><!-- col-sm-4 -->
</div> <!-- row 2-->

</div><!-- Container -->

<!-- Script-->

<?php
$base_url = reverse('admin_dashboard');
echo "
<script>
let table = '$table';
let base_url = '$base_url';
</script>"; ?>
<script>
  let tbody = document.getElementsByTagName('tbody')[0];
  tbody.addEventListener('click',function(e){
     if(e.target.parentNode.tagName=='TR') {
       let reId = e.target.parentNode.id;
       window.location = `${base_url}${table}/edit/${reId}/`;
     }
  } ,false);
 </script>
<?php require_once 'mpm/admin/components/footer_code.php'; ?>