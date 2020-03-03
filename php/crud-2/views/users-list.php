<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Project</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/livaraita.github.io/php/crud-2/scripts.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
  <a class="navbar-brand" href="#">People</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div>
    <button class="btn btn-primary my-2 my-sm-0" type="submit"><a class="text-white" href="/livaraita.github.io/php/crud-2/add">Add Person</a></button>
    <a type="submit" <?= isset($_SESSION["user_id"]) ? 'hidden' : '' ?> class="text-white btn btn-primary my-2 my-sm-0" href="/livaraita.github.io/php/crud-2/login.php">Login</a>
    <a type="submit" <?= isset($_SESSION["user_id"]) ? '' : 'hidden' ?> class="text-white btn btn-primary my-2 my-sm-0" href="/livaraita.github.io/php/crud-2/logout.php">Logout</a>
  </div>
  
</nav>

<div class="container">
    <table class="table table-hover mt-3">
        <thead>
            <th>Name</th>
            <th>Password</th>
            <th></th>
        </thead>
        <tbody>

        <?php while($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?= $row["name"]?></td>
              <td><?= $row["password"]?></td>

                <td class="d-flex justify-content-end">
                    <a href="/livaraita.github.io/php/crud-2/edit.php?id=<?= $row["id"]?>" class="btn btn-primary mx-1">Edit</a>
                    <a href="/livaraita.github.io/php/crud-2/delete.php?id=<?=  $row["id"]?>" class="btn btn-danger mx-1" >Delete (PHP)</a>
                    <button class="btn btn-danger mx-1 js-delete-row" data-id="<?= $row["id"]?>">Delete (JQuery)</button>
                
          
    
                 </td>
             </tr>
            
          <?php }
        ?>
            
       
        </tbody>
    </table>
</div>

    
</body>
</html>