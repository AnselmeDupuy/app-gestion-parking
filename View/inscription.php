<!-- <link rel="stylesheet" href="includes/componentsCss/inscription.css"> -->

<form class="inscription-form" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <label for="first-name" class="form-label">First Name</label>
    <input type="text" name="first-name" class="form-control" id="first-name" aria-describedby="firstNameHelp" required>
  </div>

  <div class="mb-3">
    <label for="last-name" class="form-label">Last Name</label>
    <input type="text" name="last-name" class="form-control" id="last-name" aria-describedby="lastNameHelp" required>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="number" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>

  <div class="mb-3">
    <label for="password-confirm" class="form-label">Confirm Password</label>
    <input type="password" name="password-confirm" class="form-control" id="password-confirm" required>
  </div>

  <button type="submit" class="btn btn-primary" name="create_user_button">Submit</button>

</form>