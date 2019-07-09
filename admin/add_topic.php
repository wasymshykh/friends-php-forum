<?php 

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3) {

    if(isset($_POST['topic_submit'])) {
        if(!empty(trim($_POST['topic_name'])) && !empty(trim($_POST['topic_description']))){
    
            $topicName = ch($_POST['topic_name']);
            $topicDescription = ch($_POST['topic_description']);
            $topicCategory = ch($_POST['topic_category']);
            
            $target_dir = "../images/topic_pictures/";
            $target_file = $target_dir . basename($_FILES["topic_icon"]["name"]);
            $file_size = $_FILES["topic_icon"]["size"];
            
            $temp = explode(".", $_FILES["topic_icon"]["name"]);
            $newfilename = '_' .round(microtime(true)) . '.' . end($temp);
        
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $imageAccepted = explode(",",getSettings('image_accepted'));
    
            if(in_array($imageFileType, $imageAccepted)) {
                if($file_size < 50000) {
                    if (move_uploaded_file($_FILES["topic_icon"]["tmp_name"], $target_dir.$newfilename)) {
    
                        if(addTopic($topicName, $topicDescription, $topicCategory, $newfilename)){
                            $success_msg = "Topic Successfully Added";
                        } else {
                            $error_msg = "Could not add the category";
                        }
    
                    } else {
                        $error_msg = "Error in moving the image";
                    }
                } else {
                    $error_msg = "File must be less than 50KB";
                }
            } else {
                $error_msg = "Invalid Image type";
            }
    
        } else {
            $error_msg = "Enter valid topic data";
        }
    }

    $page_title = "Add Topic - ".getSettings('site_title');
    include VIEWS_URL.'/admin/add_topic.php';

} else {
    header('location: '.BASE_URL.'/index.php');
}




?>