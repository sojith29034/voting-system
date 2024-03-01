<?php
require 'connect.php';
require 'links.php';

if(isset($_SESSION['loginMessage'])):
?>    
    <div class="alert alert-success alert-dismissible fade show m-2 col-12 col-lg-2 position-absolute end-0 z-2" role="alert">
        <strong><?=$_SESSION['loginMessage'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['loginMessage']);
endif; 


if(isset($_SESSION['message'])):
?>    
    <div class="alert alert-success alert-dismissible fade show m-2 col-12 col-lg-4 position-absolute bottom-0 end-0 z-2" role="alert">
        <strong><?=$_SESSION['message'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['message']);
endif; 

if(isset($_SESSION['dangerMessage'])):
?>    
    <div class="alert alert-danger alert-dismissible fade show m-2 col-12 col-lg-4 position-absolute bottom-0 end-0 z-2" role="alert">
        <strong><?=$_SESSION['dangerMessage'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['dangerMessage']);
endif; 

if(isset($_SESSION['successMessage'])):
?>
    <div class="alert alert-success alert-dismissible fade show m-2 col-12 col-lg-4 position-absolute end-0 z-2" role="alert">
        <strong><?=$_SESSION['successMessage'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['successMessage']);
endif; 

if(isset($_SESSION['votingMessage'])):
?>    
    <div class="alert alert-info alert-dismissible fade show m-2 col-12 col-lg-4 position-absolute bottom-0 end-0 z-2" role="alert">
        <strong><?=$_SESSION['votingMessage'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
unset($_SESSION['votingMessage']);
endif; 
?>
