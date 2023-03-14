<?php include './view/header.php'; ?>

<?php include './view/list_sort_menu.php'; ?>
           
<!-- display a table -->
<h4>Current View: <?php echo $category_name; ?> <br> Sorted By: <?php echo $sort_by; ?></h4>
<div class="table-responsive"> 
<table class="table">         

<?php
    if ($category_name != "All Vehicles") {
        include './view/list_sort_table.php';
    } 

    else {
        include './view/list_all_table.php'; 
    }
 ?>
</table>      
</div>

<?php include './view/footer.php'; ?>