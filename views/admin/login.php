<?php require_once BASEPATH . 'views/layouts/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Admin Login</h3>
                    <form action="<?php echo URLROOT; ?>/admin/login" method="post" novalidate>
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                class="form-control <?php echo !empty($data['username_err']) ? 'is-invalid' : ''; ?>" 
                                name="username" 
                                id="username" 
                                value="<?php echo htmlspecialchars($data['username'] ?? '', ENT_QUOTES); ?>"
                            >
                            <div class="invalid-feedback">
                                <?php echo $data['username_err'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input 
                                type="password" 
                                class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" 
                                name="password" 
                                id="password"
                            >
                            <div class="invalid-feedback">
                                <?php echo $data['password_err'] ?? ''; ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASEPATH . 'views/layouts/footer.php'; ?>
