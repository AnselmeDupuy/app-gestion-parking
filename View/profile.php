<!-- <link href="includes/componentsCss/profile.css" rel="stylesheet"> -->


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
        <h5 class="card-title">Cars</h5>
    </div>
    
    <div class="card-body">

    <div class="accordion accordion-profile-car" id="accordion-car">
      <div class="accordion-item accordion-item-profile-car">
          <button class="accordion-button accordion-button-profile-car collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Add a car
          </button>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion-car">
          <div class="accordion-body">
            <form method="post">
                <div class="mb-3">
                    <label for="car-name" class="form-label">Car Name</label>
                    <input type="text" class="form-control" id="car-name" name="car-name" required>
                </div>
                <div class="mb-3">
                    <label for="license-plate" class="form-label">License Plate</label>
                    <input type="text" class="form-control" id="license-plate" name="license-plate" required>
                </div>
                <button type="submit" class="btn btn-primary" name="create-car">Add Car</button>
            </form>
          </div>
        </div>
      </div>
    </div> 


        <div class="row users-list">
    <table class="table table-bordered table-users">
        <thead>
        <tr>
            <th scope="col">Car Name</th>
            <th scope="col">License Plate</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach($cars as $car): ?>
                <tr>
                    <td class="card-text"><?php echo $car['car_name'] ?></td>
                    <td class="card-text"><?php echo $car['license_plate'] ?></td>
                    <td class="card-text"><a href="profile&action=remove-car&car-id=<?php echo $car['id'];?>"><i class="fa-solid fa-circle-xmark text-danger"></i></a></td>
                            
                        
                </tr>

            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    </div>


    </div>
</div>
