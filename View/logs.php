<!-- <link href="includes/componentsCss/logs.css" rel="stylesheet"> -->


<form class="d-flex mb-3 logs-search" role="search" action="index.php?component=logs" method="post">
    <input class="form-control me-2" type="search" placeholder="Search logs" aria-label="Search" name="search" value="<?php echo isset($_POST['search']) ? cleanString($_POST['search']) : ''; ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>


<?php foreach($logs as $log): ?>

    <div class="card logs-card">
        <div class="card-header logs-card-header">
            <h5 class="card-title logs-card-title">Log ID: <?= $log['id'],', ', $log['action'] ?></h5>
        </div>
        <div class="card-body logs-card-body">
            <p><strong>User ID : </strong> <?= $log['user_id'] ?></p>
            <p><strong>Client IP : </strong> <?= $log['client_ip'] ?></p>
            <p><strong>User Agent :</strong> <?= $log['user_agent'] ?></p>
            <p><strong>Details :</strong> <?= $log['action_details'] ?></p>
            <p><strong>Date and time : </strong> <?= $log['created_at'] ?></p>
        </div>
    </div>

<?php endforeach; ?>