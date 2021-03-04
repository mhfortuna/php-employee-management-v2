<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.css">
    <!-- Scripts -->
    <script src="<?= BASE_URL ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?= BASE_URL ?>node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script type="module" src="<?= BASE_URL ?>assets/js/employee/employee.js"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <?php
    include BASE_PATH . '/assets/templates/navbar.php';
    ?>

    <form class="form" id="formEditEmployee" data-employee=<?= $this->employee['id'] ?>>
        <div class="form-row">
            <div class="col form-label-group">
                <label for="employeeName">Name</label>
                <input type="text" class="form-control" id="employeeName" name="name" value=<?= $this->employee['name'] ?>>
            </div>
            <div class="col form-label-group">
                <label for="employeeLastName">Last Name</label>
                <input type="text" class="form-control" id="employeeLastName" name="lastName" value=<?= $this->employee['lastName'] ?>>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-label-group">
                <label for="employeeEmail">Email Address</label>
                <input type="text" class="form-control" id="employeeEmail" name="email" aria-describedby="emailHelpBlock" value=<?= $this->employee['email'] ?>>
            </div>
            <div class="col form-label-group">
                <label for="selectGender">Gender</label>
                <select class="custom-select" id="selectGender" name="gender">
                    <option value="man" <?php if ($this->employee['gender'] == 'man') {
                                            echo ' selected="selected"';
                                        } ?>>Male</option>
                    <option value="woman" <?php if ($this->employee['gender'] == 'woman') {
                                                echo ' selected="selected"';
                                            } ?>>Female</option>
                    <option value="undefined" <?php if ($this->employee['gender'] == 'undefined') {
                                                    echo ' selected="selected"';
                                                } ?>>undefined</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-label-group">
                <label for="employeeCity">City</label>
                <input type="text" name="city" class="form-control" id="employeeCity" value=<?= $this->employee['city'] ?>>
            </div>
            <div class="col form-label-group">
                <label for="employeeStreet">Street Address</label>
                <input type="text" class="form-control" id="employeeStreet" name="streetAddress" value=<?= $this->employee['streetAddress'] ?>>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-label-group">
                <label for="employeeState">State</label>
                <input type="text" class="form-control" id="employeeState" name="state" value=<?= $this->employee['state'] ?>>
            </div>
            <div class="col form-label-group">
                <label for="employeeAge">Age</label>
                <input type="number" name="age" class="form-control" id="employeeAge" value=<?= $this->employee['age'] ?>>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-label-group">
                <label for="employeePostalCode">Postal Code</label>
                <input type="text" class="form-control" id="employeePostalCode" name="postalCode" value=<?= $this->employee['postalCode'] ?>>
            </div>
            <div class="col form-label-group">
                <label for="employeePhoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="employeePhoneNumber" name="phoneNumber" value=<?= $this->employee['phoneNumber'] ?>>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submitbtn">
                    Submit
                </button>
            </div>
            <div class="col">
                <button class="btn btn-lg btn-secondary btn-block" type="button" name="return" id="returnbtn">
                    Return
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </form>

    <?php
    include BASE_PATH . '/assets/templates/footer.php';
    ?>
</body>

</html>