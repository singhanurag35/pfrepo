<?php
session_start();
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
echo $_SESSION['csrf_token'];
?>
<html>
<form action="http://192.168.0.105:8000/create/" method="post">
Image:<br>
  <input type="file" name="profilePic">
  First name:<br>
  <input type="text" name="name">
  <br>
  Last name:<br>
  <input type="email" name="email">
  Phone:<br>
  <input type="text" name="phone">
  DOB:<br>
  <input type="date" name="dob">
  <input type='hidden' name='csrfmiddlewaretoken' value='<?php echo $_SESSION["çsrf_token"] ?>'>
  <input type="submit" value="Submit">
</form>
</html>