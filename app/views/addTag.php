
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
  <p class="h4">Add New Tag</p>  
<form action="add_tag" method="POST" >
 <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name Tag</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name Tag">
</div>


<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
</form>

 </div>   
    
</body>
</html>

