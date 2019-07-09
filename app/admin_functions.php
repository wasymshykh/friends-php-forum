<?php 

// Add category to db

function addCategory($catName, $catDescription = "") {
    global $db;
    
    $run = $db->prepare("INSERT INTO categories(name, description, created_on) VALUES(:catName, :catDescription, NOW())");
    $res = $run->execute(['catName'=>$catName,'catDescription'=>$catDescription]);

    return $res;
}

// Add topic to db

function addTopic($topicName, $topicDescription, $topicCategory, $newfilename) {

    global $db;
    
    $run = $db->prepare("INSERT INTO topics(name, description, icon, cat_id, created_on) VALUES(:topicName, :topicDescription, :newfilename, :topicCategory, NOW())");
    $res = $run->execute(['topicName'=>$topicName,'topicDescription'=>$topicDescription,'newfilename'=>$newfilename,'topicCategory'=>$topicCategory]);

    return $res;

}

// Topics list for admin

function allTopicsList() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `topics`");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Categories list for admin

function allCategoryList() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `categories`");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Users Groups list for admin

function allUsersGroups() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `user_groups`");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Unconfirmed Users for admin

function allUnconfirmedUsers() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM users WHERE `confirmed` = 0 AND `is_banned` = 0");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Users for admin

function allUsers() {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `users` WHERE `confirmed` = 1");
    $run->execute();
    $results = $run->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

// Update Settings for admin 

function updateSettings($name, $value) {
    global $db;
    
    $run = $db->prepare("UPDATE `site_settings` SET `value` = :value WHERE `name` = :name");
    $result = $run->execute(['value'=>$value, 'name'=>$name]);

    return $result;
}

// Approve user for admin

function approveUser($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `users` SET `confirmed` = 1 WHERE `id` = :id");
    $result = $run->execute(['id'=>$id]);

    return $result;
}

// Ban user for admin

function banUser($id) {
    global $db;
    
    $run = $db->prepare("UPDATE `users` SET `is_banned` = 1 WHERE `id` = :id");
    $result = $run->execute(['id'=>$id]);

    return $result;
}


function insertGroup($key, $name, $bg, $text) {
    global $db;
    
    $run = $db->prepare("INSERT INTO user_groups(group_key, group_name, badge_bg, badge_text) VALUES (:group_key, :group_name, :badge_bg,:badge_text)");
    $result = $run->execute(['group_key'=>$key, 'group_name'=>$name, 'badge_bg'=>$bg, 'badge_text'=>$text]);

    return $result;
}

function upadateGroup($id, $key, $name, $bg, $text) {
    global $db;
    
    $run = $db->prepare("UPDATE user_groups SET group_key = :group_key, group_name = :group_name, badge_bg = :badge_bg, badge_text = :badge_text WHERE id = :id");
    $result = $run->execute(['group_key'=>$key, 'group_name'=>$name, 'badge_bg'=>$bg, 'badge_text'=>$text, 'id'=>$id]);

    return $result;
}

function isGroup($id) {
    global $db;
    
    $run = $db->prepare("SELECT * FROM `user_groups` where `id` = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function deleteGroup($id) {
    global $db;
    
    $run = $db->prepare("DELETE FROM `user_groups` where `id` = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// Update Category 

function updateCategory($cat_id, $name, $description) {
    global $db;
    
    $run = $db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
    $result = $run->execute(['name'=>$name, 'description'=>$description, 'id'=>$cat_id]);

    return $result;
}

function deleteCategory($id) {
    global $db;
    
    $run = $db->prepare("DELETE FROM `categories` where `id` = :id");
    $run->execute(['id' => $id]);
    $results = $run->fetch(PDO::FETCH_ASSOC);

    return $results;
}