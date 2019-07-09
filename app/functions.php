<?php


// Checking user submitted data
function ch($data){
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Email availability checker :: Return YES if available
function ifemailAvailable($email) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE email = :email");
    $run->execute(['email'=>$email]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        return true;
    }else {
        return false;
    }
}

// Username availability checker :: Return YES if available

function ifusernameAvailable($username) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE username = :username");
    $run->execute(['username'=>$username]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        return true;
    }else {
        return false;
    }
}

// Inserting a user in db

function insertUser($firstName, $middleName, $lastName, $cast, $designation,
$posting_place, $contactMobile, $contactPhone, $contactOffice,
$presentAddress, $permanentAddress, $email, $username, $password, $picture, $ip, $confirmed, $user_group){
    global $db;

    $query = "INSERT INTO users(username,password,email,f_name,m_name,l_name,cast, designation, posting_place,
reg_date,reg_ip,confirmed,p_number,m_number,o_number,present_add,permanent_add,user_group,profile_picture) 
    VALUES(:username, :password, :email, :f_name, :m_name,:l_name,:cast,:designation,:posting_place,
    NOW(),:reg_ip,:confirmed,:p_number,:m_number,:o_number,:present_add,:permanent_add,:user_group,:profile_picture)";

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $run = $db->prepare($query);
    $check = $run->execute(['username'=>$username,
        'password'=>$password,
        'email'=>$email,
        'f_name'=>$firstName,
        'm_name'=>$middleName,
        'l_name'=>$lastName,
        'cast'=>$cast, 
        'designation'=>$designation,
        'posting_place'=>$posting_place,
        'reg_ip'=>$ip,
        'confirmed'=>$confirmed,
        'p_number'=>$contactPhone,
        'm_number'=>$contactMobile,
        'o_number'=>$contactOffice,
        'present_add'=>$presentAddress,
        'permanent_add'=>$permanentAddress,
        'user_group'=>$user_group,
        'profile_picture'=>$picture]);

    return $check;
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

// Checking if email exists for reset

function checkEmail($email) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE email = :email");
    $run->execute(['email'=>$email]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if(!empty($result)){
        return true;
    }else {
        return false;
    }
}

// Inserting record for reset request 

function insertRequest($email, $code) {
    global $db;

    $check = $db->prepare('SELECT * FROM reset_request WHERE email = :email');
    $check->execute(['email'=>$email]);
    $result = $check->fetch(PDO::FETCH_ASSOC);
    if(!empty($result)) {
        $update = $db->prepare('UPDATE reset_request SET is_used = 2 WHERE email = :email');
        $update->execute(['email' => $email]);
    }

    $insert = $db->prepare('INSERT INTO reset_request(email, code, is_used, request_date) VALUES(:email, :code, 0, NOW())');
    $insert->execute(['email' => $email, 'code' => $code]);
}

// Checking reset code validity 

function checkCode($email, $code) {
    global $db;
    
    $check = $db->prepare('SELECT * FROM reset_request WHERE email = :email AND is_used = 0');
    $check->execute(['email'=>$email]);
    $result = $check->fetch(PDO::FETCH_ASSOC);

    if($code == $result['code']) {
        return true;
    } else {
        return false;
    }
}

// Updating password from reset 

function updatePassword($email, $rest_pass) {
    global $db;
    
    $updatepassword = $db->prepare('UPDATE users SET password = :password WHERE email = :email');
    $updated = $updatepassword->execute(['email' => $email,
    'password' => $rest_pass]);
    
    if($updated) {
        $update = $db->prepare('UPDATE reset_request SET is_used = 1, used_on = NOW()  WHERE email = :email AND is_used = 0');
        $updatedif = $update->execute(['email' => $email]);
        if($updatedif) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Checking if user exists for login

function checkUser($username) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE username = :username");
    $run->execute(['username'=>$username]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if(!empty($result)){
        return true;
    }else {
        return false;
    }
}

function checkUserId($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $run->execute(['id'=>$id]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Checking password if matches with password in db

function passwordCheck($password, $username) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE username = :username");
    $run->execute(['username'=>$username]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password, $result['password'])){
        return true;
    } else {
        return false;
    }
}

// Checking if user is confirmed 

function checkConfirm($username) {
    global $db;
    
    $run = $db->prepare("SELECT id,confirmed FROM users WHERE username = :username");
    $run->execute(['username'=>$username]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    if($result['confirmed'] == 1){

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_data = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_data = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_data = $_SERVER['REMOTE_ADDR'];
        }

        $user_id = $result['id'];

        $update_log = $db->prepare("INSERT INTO login_log(user_id, user_ip, login_date) VALUES(:user_id, :user_ip, NOW())");
        $update_log->execute(['user_id' => $user_id, 'user_ip' => $ip_data]);

        return true;
    } else {
        return false;
    }
}

// User login data for session

function getUserData($username) {
    global $db;
    
    $run = $db->prepare("SELECT id,f_name,l_name,email,username,reg_date,profile_picture,user_group FROM users WHERE username = :username");
    $run->execute(['username'=>$username]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Category list for select box 

function selectCategoryList() {
    global $db;
    
    $run = $db->prepare("SELECT id, name FROM categories");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        echo '<option value="' . $result['id'] . '">'.$result['name']."</option>";
    }
}

// Category list for homepage

function categoryList() {
    global $db;
    
    $run = $db->prepare("SELECT id, name FROM categories");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Checking if category is present in db 

function isCategory($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM categories where id = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Checking if topics is present in db 

function isTopic($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM topics where id = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Checking if thread is present in db 

function isThread($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM threads where `id` = :id AND `is_deleted` = 0");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Checking if reply is present in db 

function isReply($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `replies` where id = :id AND `is_deleted` = 0");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Getting user information present in db 

function userInfo($id) {
    global $db;
    
    $run = $db->prepare("SELECT id,username, email, f_name, l_name, m_number, reg_date, user_group, profile_picture FROM users where id = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Topics list for homepage

function topicsList($category) {
    global $db;
    
    $category = (int)$category;
    $run = $db->prepare("SELECT * FROM topics WHERE cat_id = :category");
    $run->execute(['category' => $category]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Threads list for topics

function threadListPer($topic_id, $startAt, $perPage) {
    global $db;
    
    $sql = "SELECT * FROM `threads` WHERE topic_id = ".$topic_id." AND `is_deleted` = 0 ORDER BY `threads`.`last_reply` DESC LIMIT " . $startAt . " , " . $perPage;
    $run = $db->prepare($sql);
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function threadList($topic_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM threads WHERE topic_id = :topic_id ORDER BY `threads`.`last_reply` DESC");
    $run->execute(['topic_id' => $topic_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function findLastLogin($user_id) {
    global $db;
    
    $run = $db->prepare("SELECT login_date FROM login_log WHERE `user_id` = :user_id ORDER BY `login_log`.`login_date` DESC");
    $run->execute(['user_id' => $user_id]);
    $result = $run->fetch(PDO::FETCH_ASSOC);

    return $result['login_date'];
}

// Add thread to db

function createThread($title, $content, $user_id, $topic_id, $cat_id) {
    global $db;
    
    $run = $db->prepare("INSERT INTO threads(title, content, user_id, cat_id, topic_id,created_on,last_reply) VALUES(:title, :content, :user_id, :cat_id, :topic_id, NOW(), NOW())");
    $res = $run->execute(['title'=>$title,'content'=>$content,'user_id'=>$user_id,'cat_id'=>$cat_id,'topic_id'=>$topic_id]);

    return $res;
}

// Edit thread to db

function editThread($title, $content, $thread_id) {
    global $db;
    
    $run = $db->prepare("UPDATE `threads` SET `title` = :title, `content` = :content, `updated_on` = NOW() WHERE `id` = :id");
    $res = $run->execute(['title'=>$title,'content'=>$content,'id'=>$thread_id]);

    return $res;
}

// Edit reply to db

function editReply($content, $reply_id) {
    global $db;
    
    $run = $db->prepare("UPDATE `replies` SET `content` = :content, `updated_on` = NOW() WHERE `id` = :id");
    $res = $run->execute(['content'=>$content,'id'=>$reply_id]);

    return $res;
}

// Lock Thread to db

function lockThread($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `threads` SET `status` = 2 WHERE `id` = :id");
    $res = $run->execute(['id'=>$id]);

    return $res;
}

// Unlock Thread to db

function unlockThread($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `threads` SET `status` = 1 WHERE `id` = :id");
    $res = $run->execute(['id'=>$id]);

    return $res;
}

// Delete Thread to db

function deleteThread($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `threads` SET `is_deleted` = 1 WHERE `id` = :id");
    $res = $run->execute(['id'=>$id]);

    return $res;
}

// Delete reply to db

function deleteReply($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `replies` SET `is_deleted` = 1 WHERE `id` = :id");
    $res = $run->execute(['id'=>$id]);

    return $res;
}

// Adding views on visit

function view_adder($id, $views)
{
    global $db;

    $views++;
    $run = $db->prepare("UPDATE threads SET views = :views WHERE id = :id");
    $run->execute(['views' => $views, 'id' => $id]);
}

// Add reply to db

function createReply($message, $thread_id, $user_id, $topic_id, $user_group) {
    global $db;

    if($user_group != 3) {
        $run = $db->prepare("INSERT INTO replies(content, user_id, thread_id, topic_id, created_on) 
        VALUES(:content, :user_id, :thread_id, :topic_id, NOW())");
        $res = $run->execute(['content'=>$message,'user_id'=>$user_id,'thread_id'=>$thread_id,'topic_id'=>$topic_id]);
    } else {
        $run = $db->prepare("INSERT INTO replies(content, user_id, thread_id, topic_id, created_on) 
        VALUES(:content, :user_id, :thread_id, :topic_id, NOW())");
        $res = $run->execute(['content'=>$message,'user_id'=>$user_id,'thread_id'=>$thread_id,'topic_id'=>$topic_id]);
        
        $status = $db->prepare("UPDATE `threads` SET `status` = 1 WHERE `id` = :thread_id");
        $status->execute(['thread_id' => $thread_id]);
    }
    
    
    $next = $db->prepare("UPDATE `threads` SET `last_reply` = NOW() WHERE `id` = :thread_id");
    $next->execute(['thread_id' => $thread_id]);

    return $res;
}

// Convert date to custom format

function convertDate($data, $format) {
    $date = date_create($data); 
    $dated = date_format($date, $format);
    return $dated;
}

// Badge 

function badgeDetails($key) {
    global $db;
    $key = (int)$key;
    $run = $db->prepare("SELECT * FROM user_groups WHERE group_key = :key");
    $run->execute(['key' => $key]);
    $results = $run->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function checkReplies($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `replies` WHERE `thread_id` = :id AND `is_deleted` = 0");
    $run->execute(['id' => $id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Stats 

function catThreads($topic_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM threads WHERE topic_id = :id AND is_deleted = 0");
    $run->execute(['id' => $topic_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return count($results);
}

function catReplies($topic_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM replies WHERE topic_id = :id AND is_deleted = 0");
    $run->execute(['id' => $topic_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return count($results);
}

function threadReplies($thread_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM replies WHERE thread_id = :id");
    $run->execute(['id' => $thread_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return count($results);
}

function totalUsers() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `users`");
    $run->execute();
    $result = count($run->fetchAll(PDO::FETCH_ASSOC));

    return $result;
}

function totalActive() {
    global $db;
    
    $date = date("Y-m-d");

    $run = $db->prepare("SELECT * FROM `login_log` WHERE login_date LIKE '%$date%'");
    $run->execute();
    $rr = $run->fetchAll(PDO::FETCH_ASSOC);

    $arr = [];
    foreach($rr as $user) {
        if(!in_array($user['user_id'], $arr)) {
            array_push($arr, $user['user_id']);
        }
    }
    
    $result = count($arr);

    return $result;
}

function totalPosts() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `replies` WHERE `is_deleted` = 0");
    $run->execute();
    $resultOne = count($run->fetchAll(PDO::FETCH_ASSOC));
    
    $run = $db->prepare("SELECT * FROM `threads` WHERE `is_deleted` = 0");
    $run->execute();
    $resultTwo = count($run->fetchAll(PDO::FETCH_ASSOC));

    return $resultOne+$resultTwo;
}

function totalThreads() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `threads` WHERE `is_deleted` = 0");
    $run->execute();
    $result = count($run->fetchAll(PDO::FETCH_ASSOC));

    return $result;
}

function totalThreadsByUser($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `replies` WHERE `is_deleted` = 0 AND `user_id` = :id");
    $run->execute(['id' => $id]);
    $resultOne = count($run->fetchAll(PDO::FETCH_ASSOC));
    
    $run = $db->prepare("SELECT * FROM `threads` WHERE `is_deleted` = 0 AND `user_id` = :id");
    $run->execute(['id' => $id]);
    $resultTwo = count($run->fetchAll(PDO::FETCH_ASSOC));

    return $resultOne+$resultTwo;
}

function findCategoryName($cat_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `categories` WHERE `id` = :cat_id");
    $run->execute(['cat_id' => $cat_id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results['name'];
}

function findTopicName($topic_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `topics` WHERE `id` = :topic_id");
    $run->execute(['topic_id' => $topic_id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results['name'];
}

// Profile page threads & posts 

function threadListByUser($user_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `threads` WHERE `user_id` = :user_id ORDER BY `threads`.`created_on` DESC LIMIT 4");
    $run->execute(['user_id' => $user_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function replyListByUser($user_id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `replies` WHERE `user_id` = :user_id ORDER BY `replies`.`created_on` DESC LIMIT 4");
    $run->execute(['user_id' => $user_id]);
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Thread Status 

function threadStatus($status) {
    
    if($status == 0) {
        return 'Opened';
    } else if($status == 1) {
        return 'Responded';
    } else if($status == 2) {
        return 'Locked';
    } else {
        return 0;
    }

}

// Number of unconfirmed users

function numberOfUnconfirmedUsers() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `users` WHERE `confirmed` = 0");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return count($results);
}

// Number of reported posts

function numberOfReportedPosts() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `reports` WHERE `noticed` = 0");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return count($results);
}