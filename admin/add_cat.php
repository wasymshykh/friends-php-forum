<?php 

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3) {
    
    if(isset($_POST['cat_submit'])) {
        if(!empty(trim($_POST['cat_name']))){

            $catName = ch($_POST['cat_name']);
            $catDescription = $_POST['cat_description'];
            
            if(addCategory($catName, $catDescription)){
                $success_msg = "Category Successfully Added";
            } else {
                $error_msg = "Could not add the category";
            }
            
        } else {
            $error_msg = "Enter Valid Category Name";
        }
    }

    if(isset($_POST['cat_update'])){

        $cat_id = ch($_POST['cat_id']);
        $name = ch($_POST['cat_name']);
        $description = ch($_POST['cat_description']);

        if(!empty($name) && !empty($description)) {

            if(updateCategory($cat_id, $name, $description)) {
                $successMsg = "Category successfully Updated!";
            } else {
                $errorMsg = "Category couldn't be updated!";
            }

        } else {
            $errorMsg = "Category couldn't be updated!";
        }

    }

    $page_title = "Add Category - ".getSettings('site_title');
    include VIEWS_URL.'/admin/add_cat.php';

} else {
    header('location: '.BASE_URL.'/index.php');
}


?>