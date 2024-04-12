
<?php
require_once './functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to insert items into the database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    echo '
    <div class="form_container">

<form action=" '.insert($conn).' " method="post" enctype="multipart/form-data>
    <h4>insert data to the database</h4>
    <input type="file" name="photo_image"class="box">
    <input type="title" name="title" required placeholder="enter the title" class="box">
    <input type="text" name="desc" required placeholder="enter some description" class="box">
    <input type="number" name="oldPrice" required placeholder="old price" class="box">
    <input type="number" name="newPrice" required placeholder="new price" class="box">
    <input type="submit" name="insert" value="insert" class="btn">

</form>
</div>';

    ?>
    
</body>
</html>