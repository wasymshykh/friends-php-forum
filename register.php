<?php 

include 'app/start.php';
include 'app/functions.php';

if(isset($_POST['signup'])) {
    
        $firstName = ch($_POST['f_name']);  $middleName = ch($_POST['m_name']); $lastName = ch($_POST['l_name']);
        $cast = ch($_POST['cast']); $designation = ch($_POST['designation']);
    
        $posting_place = ch($_POST['posting_place']);
        $contactMobile = ch($_POST['contactMobile']);
        $contactPhone = ch($_POST['contactPhone']);
        $contactOffice = ch($_POST['contactOffice']);
        $presentAddress = ch($_POST['p_address']);
        $presentAddress2 = ch($_POST['p_address_2']);
        $permanentAddress = ch($_POST['per_address']);
        $permanentAddress2 = ch($_POST['per_address_2']);
        $email = ch($_POST['email']);
        $username = ch($_POST['username']);
        $password = ch($_POST['password']);
        $passwordC = ch($_POST['password_c']);
    
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_data = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_data = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_data = $_SERVER['REMOTE_ADDR'];
        }
    
        $target_dir = "images/profile_pictures/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $file_size = $_FILES["picture"]["size"];
        
        $temp = explode(".", $_FILES["picture"]["name"]);
        $newfilename = current($temp). '_' .round(microtime(true)) . '.' . end($temp);
    
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $imageAccepted = explode(",",getSettings('image_accepted'));
    
        if(!empty($firstName) && !empty($lastName) && !empty($cast) &&!empty($designation)
        && !empty($posting_place) && !empty($contactMobile) && !empty($presentAddress) && !empty($permanentAddress)) {
    
            if(!empty($email) && !empty($username) && !empty($password) && !empty($passwordC)){
    
                if($password == $passwordC) {
                    if(ifemailAvailable($email)) {
                        if(ifusernameAvailable($username)) {
                            
                            if(in_array($imageFileType, $imageAccepted)) {
                                
                                if($file_size < 50000) {
                                    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir.$newfilename)) {
                                        
                                        if(!empty($presentAddress2)){
                                            $presentAddress = $presentAddress . ' ' . $presentAddress2;
                                        }
                                        if(!empty($permanentAddress2)){
                                        $permanentAddress = $permanentAddress . ' ' . $permanentAddress2;
                                        }
                                        $reg_pass = password_hash($password, PASSWORD_BCRYPT);
                                        $confirmed = getSettings('default_confirmed');
                                        $user_group = getSettings('default_usergroup');
                                        
                                        echo $firstName, $middleName, $lastName, $cast, $designation,
                                        $posting_place, $contactMobile, $contactPhone, $contactOffice,
                                        $presentAddress, $permanentAddress, $email, $username, $reg_pass, $newfilename, $ip_data, $confirmed, $user_group;
    
    
                                        if(insertUser($firstName, $middleName, $lastName, $cast, $designation,
                                        $posting_place, $contactMobile, $contactPhone, $contactOffice,
                                        $presentAddress, $permanentAddress, $email, $username, $reg_pass, $newfilename, $ip_data, $confirmed, $user_group)){
    
                                            $_SESSION['reg_success_user'] = $username;
                                            $_SESSION['reg_success_email'] = $email;
                                            header('location: register_confirm.php');
                                        }
                                        else {
                                            $error_msg = "Sorry, there is problem in registration";
                                        }
                                    
                                    } else {
                                        $error_msg = "Sorry, there was an error uploading your image.";
                                    }
                                } else {
                                    $error_msg =  "Sorry, size of the file must be less than 50 KB.";
                                }
                                
                            } else {
                                $error_msg =  "Sorry, only JPG, JPEG, PNG images are allowed.";
                            }
                        } else {
                            $error_msg = "Username already exists, please choose any other username";
                        }
                    } else {
                        $error_msg = "Email already exists, please choose any other email";
                    }
                } else {
                    $error_msg = "Passwords doesn't match, please write them again";
                }
            } else {
                $error_msg = "Please fill all website login information correctly";
                var_dump($_POST);
            }
        } else {
            $error_msg = "Please fill all personal information correctly";
        }
    
    }
    


$page_title = "Register - ".getSettings('site_title');

include 'app/views/register.php';

?>