<?php
require_once('lib/common.php');
require_once('lib/navbar.php');
?>

<div class='container-fluid'>
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <form action='' class="row g-3" method='post' enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" name='firstname' value="<?php echo $_POST['firstname']; ?>" required>
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" name='lastname' value="<?php echo $_POST['lastname']; ?>" required>
        </div>
        <div class='col-md-12'>
          <label for='email' class='form-label'>Email</label>
          <input type="email" class='form-control' id='email' name='email' value="<?php echo $_POST['email']; ?>" required>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit" name='submit'>Submit form</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  if (!empty($firstName) && !empty($lastName) && !empty($email)) { ?>
    <table>
      <thead>
        <th>firstName</th>
        <th>lastName</th>
        <th>email</th>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $firstName; ?></td>
          <td><?php echo $lastName; ?></td>
          <td><?php echo $email; ?></td>
        </tr>

      </tbody>
    </table>
<?php }
}
?>
<?php
require_once('lib/footer.php');
?>