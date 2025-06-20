
<div class="mt-2 mb-2 parkings-title">
    <h1 class="text-center parkings-title">parkings list</h1>
</div>

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
        
            <?php foreach($parkings as $parking): ?>
            <tr>
                <td><?php echo $parking['place_number']; ?></td>
                <td><?php echo $parking['type']; ?></td>
                <td><?php echo $parking['status']; ?></td>
            </tr> 
                <?php endforeach; ?>
        
        </tbody>
    </table>
</div>

