<?php

use PHPMVC\Models\CategoryModel;

if($_SERVER['REQUEST_METHOD']=="POST"){
    $args = array(
       'name' => $_POST['catname']
    );
    $cat = new CategoryModel($args);
    header("Location:default");
}


?>
<div class="container test">
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="catname" class="form-control" placeholder="enter name">
        </div>
        <button class="btn btn-success">Add Category</button>
    </form>
</div>