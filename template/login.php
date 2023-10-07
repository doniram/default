<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="onecol.css">
    <title>Aplikasi Crud</title>

</head>
<body>
    <div class="container">
        <?php include "header.php";?>
        <div class="wraplogin">
        <h3>Login</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>  <input type="text" placeholder="Username" name="username" id="" class="inp"></td>
                    
                </tr>
                <tr>
                <td><input type="password" placeholder="password" name="password" id="" class="inp"></td>
                </tr>
            </table>
          
            
            <button class="btn" name="submit">Login</button>
        </form>
        </div>
        <?php include "footer.php";?>
    </div>
</body>
</html>