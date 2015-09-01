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
