<?php
require_once BASEPATH . 'models/AdminModel.php';
require_once BASEPATH . 'models/FeedbackModel.php';

class AdminController
{
    private $adminModel;
    private $feedbackModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->feedbackModel = new FeedbackModel();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            $data = [
                'username' => $username,
                'password' => $password,
                'username_err' => '',
                'password_err' => '',
            ];

            // Validate username
            if (empty($username)) {
                $data['username_err'] = 'Please enter username';
            }

            // Validate password
            if (empty($password)) {
                $data['password_err'] = 'Please enter password';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                // Check for admin
                if ($this->adminModel->login($username, $password)) {
                    $_SESSION['admin_logged_in'] = true;
                    redirect('admin/dashboard');
                    exit;
                } else {
                    $data['password_err'] = 'Invalid username or password';
                }
            }

            // Show the login view with errors
            require_once BASEPATH . 'views/admin/login.php';
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            require_once BASEPATH . 'views/admin/login.php';
        }
    }


    public function dashboard()
    {
        if (!isset($_SESSION['admin_logged_in'])) {
            redirect('admin/login');
        }

        $feedbacks = $this->feedbackModel->getAllFeedbacks();
        require_once BASEPATH . 'views/admin/dashboard.php';
    }

    public function logout()
    {
        unset($_SESSION['admin_logged_in']);
        session_destroy();
        redirect('admin/login');
    }

    public function updateStatus($id, $status)
    {
        if (!isset($_SESSION['admin_logged_in'])) {
            redirect('admin/login');
        }

        if ($this->feedbackModel->updateFeedbackStatus($id, $status)) {
            flash('feedback_status', 'Feedback status updated');
            redirect('admin/dashboard');
        } else {
            die('Something went wrong');
        }
    }
}
?>