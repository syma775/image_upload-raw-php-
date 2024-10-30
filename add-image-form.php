<?php

require_once('config.php');
if(!empty($_POST)){
$name = $_POST['your_name'];
$image= $_FILES['image'];
// var_dump($image);
// $image = "dummy";

$image_name = 'img_'.rand(10,20).time().'_'.rand().'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
// echo ($image_name);

$query = "INSERT INTO image_upload (`your_name`,`image`) VALUES('$name','$image_name')";
$insert = mysqli_query($conn,$query);

if($insert){
    move_uploaded_file($image['tmp_name'],'uploads/'.$image_name);
    header('location:add-image-form.php');
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4 style="text-align:center;margin-top:40px;">Image Upload</h4>
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label style="margin-top:20px;">Name</label>
                            <input type="text" name="your_name" placeholder="Enter Your Name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label style="margin-top:20px;">Image</label>
                            <input type="file" name="image" class="form=control"/>
                        </div>
                        <button style="margin-top:20px;" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>