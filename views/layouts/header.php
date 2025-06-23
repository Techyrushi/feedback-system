<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback System</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo URLROOT; ?>/feedback/index">Feedback System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/feedback/index">View Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/feedback/submit">Submit Feedback</a>
                        </li>
                        <?php if (isset($_SESSION['admin_logged_in'])): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo URLROOT; ?>/admin/dashboard">Admin Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="<?php echo URLROOT; ?>/admin/logout">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo URLROOT; ?>/admin/login">Admin Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        <?php flash('feedback_message'); ?>
        <?php flash('feedback_status'); ?>
