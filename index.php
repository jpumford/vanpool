<?php
$page = 'index';
require_once('./header.php');

if ($_POST) {
    // form has been posted. Begin validation.
    $errors = '';
    $success = false;
    if (!$_POST['first-name']) {
        $errors .= "Please provide a first name<br>";
    }
    if (!$_POST['last-name']) {
        $errors .= "Please provide a last name<br>";
    }
    if (!$_POST['phone-number']) {
        $errors .= "Please provide a phone number<br>";
    }
    if (!$_POST['email']) {
        $errors .= "Please provide an email<br>";
    }
    if (!$_POST['street1']) {
        $errors .= "Please provide a street address<br>";
    }
    if (!$_POST['city']) {
        $errors .= "Please provide a city<br>";
    }
    if (!$_POST['zip']) {
        $errors .= "Please provide a ZIP code<br>";
    }
    if (!$_POST['start-time']) {
        $errors .= "Please specify when you would like to leave home<br>";
    }
    if (!$_POST['end-time']) {
        $errors .= "Please specity when you would like to leave work<br>";
    }
    if (!$errors) {
        $success = true;
    }
    if ($success) {
        $firstName = "\"" . $mysql->real_escape_string($_POST['first-name']) . "\"";
        $lastName = "\"" . $mysql->real_escape_string($_POST['last-name']) . "\"";
        $phone = "\"" . $mysql->real_escape_string($_POST['phone-number']) . "\"";
        $email = "\"" . $mysql->real_escape_string($_POST['email']) . "\"";
        $street1 = "\"" . $mysql->real_escape_string($_POST['street1']) . "\"";
        $street2 = $_POST['street2'] ? "\"" . $mysql->real_escape_string($_POST['street2']) . "\"" : "NULL";
        $city = "\"" . $mysql->real_escape_string($_POST['city']) . "\"";
        $zip = "\"" . $mysql->real_escape_string($_POST['zip']) . "\"";
        $leaveHouse = $_POST['start-time'] ? "\"" . $mysql->real_escape_string($_POST['start-time']) . "\"" : "NULL";
        $leaveWork = $_POST['end-time'] ? "\"" . $mysql->real_escape_string($_POST['end-time']) . "\"" : "NULL";
        $notes = $_POST['notes'] ? "\"" . $mysql->real_escape_string($_POST['notes']) . "\"" : "NULL";
        // write to the database!
        $query = "insert into People (firstName, lastName, phoneNumber," .
            " email, street1, street2, city, zip, leaveHouse, leaveWork, notes) VALUES ($firstName," .
            " $lastName, $phone, $email, $street1, $street2, $city, $zip, $leaveHouse, $leaveWork, $notes)";
        $mysql->query($query);
        $mysql->commit();
        $mysql->close();
    }
}
?>
<section style="text-align: center; width: 500px; margin: 25px auto 0 auto;">
<h1>Vanpool Sign-Up Form</h1>
<h5 style="margin-bottom: 25px;">Please fill out the following form. Items marked with a (*) are required. You will be contacted shortly if we match you with a vanpoool!</h5>
<form class="form-horizontal" method="post">
    <?php if ($errors) { ?>
    <div class="alert error">
        <div><?php echo $errors; ?></div>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert success">
        <div>Thanks, your response has been recorded!</div>
    </div>
    <?php } ?>
    <div class="control-group">
        <label class="control-label" for="first-name">First Name <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="first-name" name="first-name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="last-name">Last Name <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="last-name" name="last-name">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="phone-number">Phone Number <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="phone-number" name="phone-number">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email <span class="required">*</span></label>
        <div class="controls">
            <input type="email" id="email" name="email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="street1">Street Address <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="street1" name="street1">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="street2">Street Address 2</label>
        <div class="controls">
            <input type="text" id="street2" name="street2">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="city">City <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="city" name="city">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="zip">Zip Code <span class="required">*</span></label>
        <div class="controls">
            <input type="text" id="zip" name="zip">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="start-time">Leave House At</label>
        <div class="controls">
            <input type="text" value="9:00" id="start-time" name="start-time">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="end-time">Leave Work At</label>
        <div class="controls">
            <input type="text" value="5:00" id="end-time" name="end-time">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="notes">Notes</label>
        <div class="controls">
            <textarea rows="4" id="notes" name="notes"></textarea>
        </div>
    </div>
    <button class="primary" id="submit">Submit</button>
</form>
</section>

<?php
require_once('./footer.php');
?>
