<!-- // require_once('./library/sessionHelper.php');
// checkExpiredSession();
// if(!isset($_SESSION)){
// header("Location : ../index.php");
// }
// echo "Creating employee OK";
// echo isset($this->employee) ? $this->employee : "No employee"; -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link href="../../public/assets/css/main.css" rel="stylesheet" />
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
  <header class="bg-light mb-4">
    <?php
    require("views/header.php");
    ?>
  </header>
  <main class="container-xl mx-auto pb-90">
    <form action="./library/employeeController.php?update=true" method="POST" class="container-md">
      <?php
      if (isset($_GET['okUpdate'])) {
        if ($_GET['okUpdate'] == true) {
          echo "<div class='alert alert-success text-center'> <h5>Employee Successfully Saved!</h5></div>";
        }
      }
      ?>
      <h3>Employee: </h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input name="name" type="text" class="form-control" id="inputName" value="<?= isset($this->employee['name']) ? $this->employee['name'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputMail">Email address</label>
            <input name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="<?= isset($this->employee['email']) ? $this->employee['email'] : '' ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputCity">City</label>
            <input name="city" type="text" class="form-control" id="inputCity" value="<?= isset($this->employee['city']) ? $this->employee['city'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputState">State</label>
            <input name="state" type="text" class="form-control" id="inputState" value="<?= isset($this->employee['state']) ? $this->employee['state'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputPostalCode">Postal Code</label>
            <input name="postalCode" type="number" class="form-control" id="inputPostalCode" value="<?= isset($this->employee['postalCode']) ? $this->employee['postalCode'] : '' ?>">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input name="lastName" type="text" class="form-control" id="inputLastName" value="<?= isset($this->employee['lastName']) ? $this->employee['lastName'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputGender">Example select</label>
            <select class="form-control" id="inputGender" name="gender[]">

              <option value="default">Choose...</option>

              <option value="man" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'man' ? "selected='selected'" : null ?>> man</option>

              <option value="woman" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'woman' ? "selected='selected'" : null ?>>woman</option>

              <option value="other" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'other' ? "selected='selected'" : null ?>>other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputStreetAddress">Street Address</label>
            <input name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="<?= isset($this->employee['streetAddress']) ? $this->employee['streetAddress'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputAge">Age</label>
            <input name="age" type="number" class="form-control" id="inputAge" value="<?= isset($this->employee['age']) ? $this->employee['age'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="<?= isset($this->employee['phoneNumber']) ? $this->employee['phoneNumber'] : '' ?>">
          </div>
        </div>
      </div>
      <a type="btn" class="btn btn-secondary" href="dashboard.php">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
  <footer class="fixed-bottom">
    <?php
    require("views/footer.php");
    ?>
  </footer>
  <!-- <script src="public/assets/js/index.js"></script> -->
</body>

</html>