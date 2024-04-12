<?php
$conn = mysqli_connect('localhost','root','','shopdb');


function insert($conn){
    if(isset($_POST['insert']))
    {
        $title = $_POST['title'];
        $description = $_POST['desc'];
        $oldPrice = $_POST['oldPrice'];
        $newPrice = $_POST['newPrice'];
        $image_name = $_FILES['photo_image']['name'];
        $tempimg = $_FILES['photo_image']['tmp_name'];
        $rename_img = uniqid().$image_name;
        $directory = "./images/".$rename_img;

        move_uploaded_file($tempimg, $directory);

        $sql = "INSERT INTO products VALUES(' $title','$description','$oldPrice',' $newPrice','$rename_img')";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ./index.php");
            exit();
        }


    }
}