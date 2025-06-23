<?php require_once BASEPATH . 'views/layouts/header.php'; ?>

<h2 class="text-center mb-4">Submit Feedback</h2>

<form action="<?php echo URLROOT; ?>/feedback/submit" method="post" id="feedbackForm" class="mx-auto"
    style="max-width: 600px;">
    <!-- Full Name -->
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
        <input type="text" name="full_name" id="full_name"
            class="form-control <?php echo !empty($data['full_name_err']) ? 'is-invalid' : ''; ?>"
            value="<?php echo htmlspecialchars($data['full_name']); ?>">
        <div class="invalid-feedback">
            <?php echo $data['full_name_err']; ?>
        </div>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" name="email" id="email"
            class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>"
            value="<?php echo htmlspecialchars($data['email']); ?>">
        <div class="invalid-feedback">
            <?php echo $data['email_err']; ?>
        </div>
    </div>

    <!-- Rating -->
    <div class="mb-3">
        <label for="rating" class="form-label">Rating<span class="text-danger">*</span></label>
        <select name="rating" id="rating"
            class="form-select <?php echo !empty($data['rating_err']) ? 'is-invalid' : ''; ?>">
            <option value="">Select Rating</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?php echo $i; ?>" <?php echo ($data['rating'] == (string) $i) ? 'selected' : ''; ?>>
                    <?php echo $i . ' - ' . ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent'][$i - 1]; ?>
                </option>
            <?php endfor; ?>
        </select>
        <div class="invalid-feedback">
            <?php echo $data['rating_err']; ?>
        </div>
    </div>

    <!-- Message -->
    <div class="mb-3">
        <label for="message" class="form-label">Message (max 250 characters)<span class="text-danger">*</span></label>
        <textarea name="message" id="message"
            class="form-control <?php echo !empty($data['message_err']) ? 'is-invalid' : ''; ?>" maxlength="250"
            rows="4"><?php echo htmlspecialchars($data['message']); ?></textarea>
        <div class="invalid-feedback">
            <?php echo $data['message_err']; ?>
        </div>
        <small id="charCount" class="form-text text-muted text-end">250 characters remaining</small>
    </div>

    <!-- Submit -->
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </div>
</form>

<!-- Character Count Script -->
<script>
    const message = document.getElementById('message');
    const charCount = document.getElementById('charCount');

    const updateCharCount = () => {
        const remaining = 250 - message.value.length;
        charCount.textContent = `${remaining} characters remaining`;
    };

    message.addEventListener('input', updateCharCount);
    document.addEventListener('DOMContentLoaded', updateCharCount);
</script>

<?php require_once BASEPATH . 'views/layouts/footer.php'; ?>