<?php
require 'connect.php';
require 'links.php';

if(isset($_SESSION['notification'])):
?>    
    <div class="alert alert-success alert-dismissible fade show m-2 col-2 position-absolute end-0" role="alert">
        <strong><?=$_SESSION['notification'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['notification']);
endif; 
?>
