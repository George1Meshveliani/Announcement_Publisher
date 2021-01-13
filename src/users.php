<?php

function getDatabaseUsers() {
    return $users = [
        [1 =>'Gio'],
        [2 => 'Saba'],
    ];
}


/**
 * Fetch all users
 *
 * @return array[]
 */
function getUsers() {
    $users = getDatabaseUsers();
    //print_r($users);
    require_once 'src/register.php';
    //  return $users;
}

/**
 * Return specific user by his/her id
 * @param $id
 *      Id of the user in the database
 * @return array|string[]
 *      An array containing specific user data
 */

function getUserById($id) {
    global $users;

    foreach($users as $user) {
        if(isset($user[$id])){
            print_r($users);
            return $user;
        }
    }
    return [];
}

print getUsers();
