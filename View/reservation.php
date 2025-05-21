<h1>TEST</h1>

<?php foreach($parkings as $parking): ?>
<p>-----------------------</p>
<p><strong>ID</strong> <?= $parking['id'] ?></p>
<p><strong>Place Number</strong> <?= $parking['place_number'] ?></p>
<p><strong>Type</strong> <?= $parking['type'] ?></p>
<p><strong>Status</strong> <?= $parking['status'] ?></p>
<?php endforeach; ?>