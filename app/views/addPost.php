
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container w-75 m-auto" id="add-post" >
  <p class="h4">Add New POST</p>  
<form action="add_post" method="POST" enctype="multipart/form-data">
 <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title Post</label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Author name</label>
  <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Author">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">File image</label>
  <input type="file" name="img" class="form-control" id="exampleFormControlInput1" placeholder="Author">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Body News</label>
  <textarea name="body"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Belong Tag</label>
  <select class="form-select" name='tag' aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php 
  require_once "app/controllers/admin.php";
  $tag =new admin;
  $tag=$tag->selectTag();
  foreach($tag as $row){
  ?>
  <option value=<?php echo $row['id']; ?> > <?php echo $row['name']; ?> </option>
  <?php } ?>
</select>
</div>

    <button type="submit" name="submit" class="btn btn-primary" >Submitddd</button>

</form>

 </div>   
  
    
</body>
</html>

