<?php
//========= Method collection =============//
function login_user($post)
{
    global $connection;
    $query = "SELECT * FROM users WHERE id = {$post["user_id"]}";
    $results = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($results);

    return $result;
}

function add_messages($content)
{
    global $connection;
    $query = "INSERT INTO messages(user_id, message, created_at) VALUES('{$_SESSION["user_id"]}', '{$content}', NOW());";
    $result = mysqli_query($connection, $query);
    if($connection->error){
        die("Error: ".$connection->error);
    }

    return "Added new message id ".mysqli_insert_id($connection);
}

function add_comments($id, $content)
{
    global $connection;
    $query = "INSERT INTO comments(message_id, user_id, comment, created_at) VALUES('{$id}', '{$_SESSION["user_id"]}', '{$content}', NOW());";
    $result = mysqli_query($connection, $query);

    return "Added new comment id ".mysqli_insert_id($connection);
}

function view_messages()
{
    global $connection;
    $query = "SELECT messages.id, users.first_name, users.last_name, messages.message, messages.created_at FROM messages LEFT JOIN users ON users.id = messages.user_id ORDER BY messages.created_at ASC;";
    $result = mysqli_query($connection, $query);

    return $result;
}

function view_comments($id)
{
    global $connection;
    $query = "SELECT comments.comment, users.first_name, users.last_name, comments.created_at FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.message_id = $id ORDER BY comments.created_at ASC;";
    $result = mysqli_query($connection, $query);

    return $result;
}
?>