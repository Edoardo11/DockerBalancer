<?php
  //Scrivo nel db
  include("Account/CheckConn.php");
  $num = explode(".", ($_SERVER["SERVER_ADDR"]));
  if($num[3] == "3"){ //APP1
    $query="INSERT INTO request(appname, indirizzo, tempo) VALUES('app1','".$_SERVER["SERVER_ADDR"]."','".date("Y-m-d H:i:s")."')";
    if (mysqli_query($con,$query)) {
    } else {
      echo mysqli_error($con);
      echo "Errore inserimento della richiesta";
    }
  }else{  //APP2
    $query="INSERT INTO request(appname, indirizzo, tempo) VALUES('app2','".$_SERVER["SERVER_ADDR"]."','".date("Y-m-d H:i:s")."')";
    if (mysqli_query($con,$query)) { 
    } else {
      echo mysqli_error($con);
      echo "Errore inserimento della richiesta";  
    }
  }
    $query="select * from request;";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
      for($i=0;$i<mysqli_num_rows($result);$i++){
        $row = mysqli_fetch_assoc($result);
        echo " - " . $row["appname"] . " - " . $row["indirizzo"] . " - " . $row["tempo"] . "<br/>";
      }
    } else {
      echo "Nessuna richiesta salvata";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src='Script.js'></script>
    </head>
    <body>
      <div class="container d-flex justify-content-center align-items-center" style="margin-top: 15%;">
        <form method="post" action="Account/Login.php" style="display: block;" id="LoginForm">
            <h1 style="display: inline;">Login<div onclick="Change(id)" style="display:inline;color:darkgrey;cursor:pointer;" id="r"> Registrazione</div></h1>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 2%;">Submit</button>
          </form>

          <form method="post" action="Account/Registrazione.php" style="display: none;" id="RegForm">
            <h1 style="display: inline;">Registrazione<div onclick="Change(id)" style="display:inline;color:darkgrey;cursor:pointer;" id="l"> Login</div></h1>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="Rpassword" placeholder="Password" name="pass" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm password</label>
              <input type="password" class="form-control" id="Rconfirm_password" placeholder="Confirm Password" name="confpass" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 2%;" onclick="return Validate()">Submit</button>
          </form>
      </div>
    </body>
</html>