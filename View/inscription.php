<link rel="stylesheet" href="includes/componentsCss/inscription.css">

<form class="inscription-form" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="first-name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first-name" aria-describedby="firstNameHelp">
  </div>

  <div class="mb-3">
    <label for="last-name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last-name" aria-describedby="lastNameHelp">
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phone" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password">
  </div>

  <div class="mb-3">
    <label for="password-confirm" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password-confirm">
  </div>

  <button type="submit" class="btn btn-primary" name="create_user_button">Submit</button>

</form>