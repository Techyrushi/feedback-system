<?php require_once BASEPATH . 'views/layouts/header.php'; ?>

<div class="container">
    <h2 class="mb-4 text-center">Admin Dashboard</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($feedbacks as $feedback): ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($feedback->full_name); ?></td>
                        <td><?php echo htmlspecialchars($feedback->email); ?></td>
                        <td class="text-warning">
                            <?php
                            echo str_repeat('★', $feedback->rating);
                            echo str_repeat('☆', 5 - $feedback->rating);
                            ?>
                        </td>
                        <td><?php echo nl2br(htmlspecialchars($feedback->message)); ?></td>
                        <td>
                            <span class="badge 
                                <?php
                                echo $feedback->status == 'approved' ? 'bg-success' :
                                    ($feedback->status == 'rejected' ? 'bg-danger' : 'bg-secondary');
                                ?>">
                                <?php echo ucfirst($feedback->status); ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($feedback->status == 'pending'): ?>
                                <a href="<?php echo URLROOT; ?>/admin/updateStatus/<?php echo $feedback->id; ?>/approved"
                                    class="btn btn-sm btn-success mb-1">Approve</a>
                                <a href="<?php echo URLROOT; ?>/admin/updateStatus/<?php echo $feedback->id; ?>/rejected"
                                    class="btn btn-sm btn-danger">Reject</a>
                            <?php else: ?>
                                <span class="text-muted">No Action</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once BASEPATH . 'views/layouts/footer.php'; ?>