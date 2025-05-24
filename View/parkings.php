
<div class="mt-2 mb-2">
    <h1 class="text-center">parkings list</h1>
</div>

<form class="d-flex parkings-search" role="search" action="index.php?component=parkings" method="post">
        <input class="form-control me-2" type="search" placeholder="Search a parking" aria-label="Search" name="search" value="<?php echo (isset($_POST['search'])) ? cleanString($_POST['search']) : '';?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="row parkings-list">
    <table class="table table-bordered table-parkings">
        <thead>
        <tr>
            <th scope="col">Place Number</th>
            <th scope="col">Type</th>
            <th scope="col">Subscription Type</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach($parkings as $parking): ?>
                <tr>
                    <td><?php echo $parking['place_number']; ?></td>
                    <td><?php echo $parking['type']; ?></td>
                    <td><?php echo $parking['status']; ?></td>
                </tr>

            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
</div>

