<link href="includes/componentsCss/users.css" rel="stylesheet">

<div class="mt-2 mb-2">
    <h1 class="text-center">Users list</h1>
</div>

<form class="d-flex users-search" role="search" action="index.php?component=users" method="post">
        <input class="form-control me-2" type="search" placeholder="Search a user" aria-label="Search" name="search" value="<?php echo (isset($_POST['search'])) ? cleanString($_POST['search']) : '';?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="row users-list">
    <table class="table table-bordered ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Active</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['firstName']; ?></td>
                    <td><?php echo $user['surName']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td>
                        <a
                            href="index.php?component=users&action=toggle_enabled&id=<?php echo $user['id'];?>">
                            <i
                                class="fa-solid <?php echo ($user['is_active'])
                                ? 'fa-circle-check text-success'
                                : 'fa-circle-xmark text-danger' ?>">
                            </i>
                        </a>
                    </td>
                    <td><?php if($user['group_id'] === 1){echo 'user';} else {echo 'admin';};?></td>
                </tr>

            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
</div>

