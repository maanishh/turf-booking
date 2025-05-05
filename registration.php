<?php include('./partials/menu.php') ?>
      <div class="title">
                <h1 class="main-title">Registration</h1>
      </div>
    </div>
    <br>
</div>
<!-- <?php include('./config/constants.php'); ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/script.js"></script>
</head>

<body>
  <br><br>
  <center>
    <?php
      if(isset($_SESSION['register']))
      {
          echo $_SESSION['register'];
          unset($_SESSION['register']);
      }
    ?>
  </center>
  <br><br>
  <div class="registration-container">
    <form method="POST" class="registration-form">

      <!-- Full Name -->
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" id="fullName" name="fullname" required>
      </div>

      <!-- Username -->
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>

      <!-- Gender -->
      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>

      <!-- Age -->
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="18" required>
      </div>

      <!-- Date of Birth -->
      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
      </div>

      <!-- City -->
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" id="city" name="city" required>
      </div>

      <!-- Contact Number -->
      <div class="form-group">
        <label for="contact">Contact Number</label>
        <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required>
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="cpassword" required>
      </div>

      <!-- Submit Button -->
      <div class="form-group">
        <button type="submit" name="submit">Register</button>
      </div>
      <div class="back">
        <a href="<?php echo SITEURL; ?>" style="color: black;">Back</a>
      </div>
    </form>
  </div>
  <br><br><br><br>
  <?php include('./partials/footer.php') ?>
</body>

</html>
<?php
  if(isset($_POST['submit']))
  {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword)
    {
      $sql = "INSERT INTO registration SET fullname='$fullname', username='$username', gender='$gender', age='$age', dob='$dob', city='$city', contact='$contact', email='$email', password='$password'";
      $res = mysqli_query($conn, $sql);

      if($res==true)
      {
        $_SESSION['register'] = "<div class='success'>Register Successfully</div>";
        header("location:".SITEURL.'login-user.php');
      }
      else
      {
        $_SESSION['register'] = "<div class='error'>Failed To Register</div>";
        header("location:".SITEURL.'registration.php');
      }
    }
  }
?>