<?php

/**
 * @return mysqli
 */
function open_database_connection()
{
    return mysqli_connect('localhost', 'root', '1234', 'blog_db', 3306);
}

/**
 * @param $link
 */
function close_database_connection($link)
{
    mysqli_close($link);
}

/**
 * @return array
 */
function get_all_posts()
{
    $link = open_database_connection();
    $result = mysqli_query($link, 'SELECT id, title FROM post');
    $posts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    close_database_connection($link);
    return $posts;
}

/**
 * @param $id
 *
 * @return array|null
 */
function get_post_by_id($id)
{
    $link = open_database_connection();
    $id = intval($id);
    $query = 'SELECT id, title FROM post WHERE id = '. $id;

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    close_database_connection($link);
    return $row;
}