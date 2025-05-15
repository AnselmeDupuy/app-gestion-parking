<!-- <link href="includes/componentsCss/profile.css" rel="stylesheet"> -->

<div class="card-group">
<div class="card profile-card">
    <div class="card-header">
        <h5 class="card-title">Profile</h5>
    </div>
    
    <div class="card-body">
    <p class="card-text">First Name : <?php echo $user['firstName'] ?></p>
    <p class="card-text">Last Name : <?php echo $user['surName'] ?></p>
    <p class="card-text">Email : <?php echo $user['email'] ?></p>
    <p class="card-text">Phone number : <?php echo $user['phone'] ?></p>
    <p class="card-text">Inscription Date : <?php echo $user['created_at'] ?></p>
    <p class="card-text">Group : <?php if($user['group_id'] === 1){echo 'user';} else {echo 'admin';}; ?></p>
    <form method="post">
    <button type="submit" class="btn btn-primary" name="edit-profile">Edit Profile</button>
  </form>
</div>
</div>

<div class="card profile-card card-history">
    <div class="card-header">
        <h5 class="card-title">Reservation History</h5>
    </div>
    
    <div class="card-body">


  </div>
</div>
</div>