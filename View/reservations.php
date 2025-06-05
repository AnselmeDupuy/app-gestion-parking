<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Parking_id</th>
                <th scope="col">Car_id</th>
                <th scope="col">Status</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody id='table-body-reservations'>
            
                <?php foreach($reservations as $reservation): ?>
                    <tr>
                    <td><?php echo $reservation['id']; ?></td>
                    <td><?php echo $reservation['user_id']; ?></td>
                    <td><?php echo $reservation['firstName']. ' '. $reservation['surName']; ?></td>
                    <td><?php echo $reservation['parking_id']; ?></td>
                    <td><?php echo $reservation['car_id']; ?></td>
                    <td><?php echo $reservation['status']; ?></td>
                    <td><?php echo $reservation['start_time']; ?></td>
                    <td><?php echo $reservation['end_time']; ?></td>
                    <td><?php echo $reservation['created_at']; ?></td>
                    <td>place holder</td>
                    </tr>
                <?php endforeach; ?>
        
        </tbody>
    </table>
</div>