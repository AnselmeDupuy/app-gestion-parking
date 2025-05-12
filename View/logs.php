


<?php foreach($logs as $log): ?>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Log ID: <?= $log['id'],', ', $log['action'] ?></h5>
        </div>
        <div class="card-body">
            <p><strong>User ID : </strong> <?= $log['user_id'] ?></p>
            <p><strong>Client IP : </strong> <?= $log['client_ip'] ?></p>
            <p><strong>User Agent :</strong> <?= $log['user_agent'] ?></p>
            <p><strong>Details :</strong> <?= $log['action_details'] ?></p>
            <p><strong>Date and time : </strong> <?= $log['created_at'] ?></p>
        </div>
    </div>

<?php endforeach; ?>