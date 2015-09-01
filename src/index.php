<?php

$link = mysqli_connect('localhost', 'root', '1234', 'blog_db', 3306);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($link, 'SELECT id, title from post');

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>List of Posts</title>
</head>
<body>
    <h1>List of Posts</h1>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    <a href="/show.php?id=<?php echo $row['id'] ?>">
                        <?php echo $row['title'] ?>
                    </a>
                </li>
            <?php endwhile ?>
        </ul>
</body>
</html>

<?php

mysqli_close($link);

?>

/**

• No error-checking: What if the connection to the database fails?
• Poor organization: If the application grows, this single file will become increasingly
unmaintainable. Where should you put code to handle a form submission? How can you
validate data? Where should code go for sending emails?
• Difficult to reuse code: Since everything is in one file, there's no way to reuse any part of the
application for other "pages" of the blog.

*/
