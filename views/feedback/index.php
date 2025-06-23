<?php require_once BASEPATH . 'views/layouts/header.php'; ?>

<h2 class="text-center mb-4">Customer Feedback</h2>

<?php flash('feedback_message'); ?>

<?php if (!empty($feedbacks)) : ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($feedbacks as $feedback) : ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo htmlspecialchars($feedback->full_name); ?></h5>
                        <p class="mb-1 text-warning">
                            <?php
                                echo str_repeat('★', $feedback->rating);
                                echo str_repeat('☆', 5 - $feedback->rating);
                            ?>
                        </p>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($feedback->message)); ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on: <?php echo date('M j, Y', strtotime($feedback->created_at)); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="alert alert-info text-center mt-4">
        No feedback available yet.
    </div>
<?php endif; ?>

<?php require_once BASEPATH . 'views/layouts/footer.php'; ?>
