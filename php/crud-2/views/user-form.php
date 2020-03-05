

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
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <form action="/livaraita.github.io/php/crud-2/<?= $edit ? 'edit.php' : 'add' ?>" method="post">
            <div class="form-group">
                <label>Name
                    <input name="name" class="form-control" type="text" value="<?php echo $name ?>">
                </label>
            </div>
            <div>
                <label>Password
                    <input name="password" class="form-control" type="text" value="<?= $password?>">
                </label>
            </div>
            <input hidden name="id" value="<?= $id ?>">
            <button name="submit" type="submit" class="btn btn-primary">Save (PHP)</button>
            <button name="submit"type="submit" class="btn btn-primary js-save-data">Save (JQuery)</button>
        </form>
    </div>

  


</form>

    
</body>
</html>