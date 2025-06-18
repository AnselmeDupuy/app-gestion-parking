<!-- <link href="includes/componentsCss/profile.css" rel="stylesheet"> -->


<div class="card profile-card">
    <div class="card-header">
        <h5 class="card-title">Profile</h5>
    </div>
    
    <div class="card-body card-body-profile">




    </div>
    <button class="btn btn-primary btn-edit-profile" id="edit-profile-btn" name="edit-profile">Edit Profile</button>
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
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordion-car">
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

<div id="edit-profile-modal" class="modal-overlay" style="display:none;">
  <div class="modal-content">
    <div class="modal-body">
        <form id="edit-profile-form">
        <h2>Edit Profile</h2>
        <label>First Name: <input type="text" name="firstName" required></label>
        <label>Last Name: <input type="text" name="surName" required></label>
        <label>Email: <input type="email" name="email" required></label>
        <label>Phone: <input type="number" name="phone" required></label>
        <label>New Password: <input type="password" name="password"></label>
        <label>Confirm New Password: <input type="password" name="password-confirm"></label>
        <div>
            <button class="btn btn-primary" type="button" id="close-modal-btn">Cancel</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
        </form>
    </div>
  </div>
</div>


<script type="module">
    import { getUserById } from './assets/services/profile.js'
    document.addEventListener('DOMContentLoaded', async () => {
        const userContainer = document.querySelector('.card-body-profile')
        const userId = new URLSearchParams(window.location.search).get('user_id')
        const modal = document.getElementById("edit-profile-modal")
        const editBtn = document.getElementById("edit-profile-btn")
        const closeModalBtn = document.getElementById("close-modal-btn")

        editBtn.addEventListener("click", () => {
            modal.style.display = "flex"
        })

        closeModalBtn.addEventListener("click", () => {
            modal.style.display = "none"
        })



        document.getElementById("edit-profile-form").addEventListener("submit", async (e) => {
            e.preventDefault()
            const formData = new FormData(e.target)
            const data = Object.fromEntries(formData.entries())
            try {
                const response = await fetch(`profile&action=edit-profile&user_id=${userId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    modal.style.display = "none"
                    location.reload()
                } else {
                    console.error('Failed to update profile')
                }
            } catch (error) {
                console.error('Error:', error)
            }
        })

        getUserById(userId, userContainer)




    })
    </script>
