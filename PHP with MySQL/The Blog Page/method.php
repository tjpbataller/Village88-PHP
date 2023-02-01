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

function add_review($content)
{
    global $connection;
    $query = "INSERT INTO reviews(user_id, content, created_at) VALUES('{$_SESSION["user_id"]}', '{$content}', NOW());";
    $result = mysqli_query($connection, $query);
    if($connection->error){
        die("Error: ".$connection->error);
    }

    return "Added new review id ".mysqli_insert_id($connection);
}

function add_reply($id, $content)
{
    global $connection;
    $query = "INSERT INTO replies(review_id, user_id, content, created_at) VALUES('{$id}', '{$_SESSION["user_id"]}', '{$content}', NOW());";
    $result = mysqli_query($connection, $query);

    return "Added new reply id ".mysqli_insert_id($connection);
}

function view_review()
{
    global $connection;
    $query = "SELECT reviews.id, users.first_name, users.last_name, reviews.content, reviews.created_at FROM reviews LEFT JOIN users ON users.id = reviews.user_id ORDER BY reviews.created_at ASC;";
    $result = mysqli_query($connection, $query);

    return $result;
}

function view_reply($id)
{
    global $connection;
    $query = "SELECT replies.content, users.first_name, users.last_name, replies.created_at FROM replies INNER JOIN users ON replies.user_id = users.id WHERE replies.review_id = $id ORDER BY replies.created_at ASC;";
    $result = mysqli_query($connection, $query);

    return $result;
}
?>