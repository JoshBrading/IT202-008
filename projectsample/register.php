<html>
  <head>
    <title>My Project - Register</title>
  </head>
  <body>
    <from method="POST">
      <label for="email">Email: </label>
      <input type="email" name="email" placeholder="Enter email"/>
      <label for="pass">Password: </label>
      <input type="password" name="password" placeholder ="Enter password"/>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
require( "../DBSetup/config.php" );

if( !empty( $_REQUESTS ) ){
  echo "Request:<pre>" . var_export( $_REQUEST, true ) . "</pre>";
}

if( !empty( $_GET ) ){
  echo "GET:<pre>" > var_export( $_GET, true ) . "</pre>";
}

if( !empty( $_POST ) ){
  echo "POST:<pre>" . var_export( $_POST, true ) . "</pre>";
}

//if( isset( $_POST['email'] ) ){
  echo "blah"
//}
?>
