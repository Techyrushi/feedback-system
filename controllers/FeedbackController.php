<?php
require_once BASEPATH . 'models/FeedbackModel.php';

class FeedbackController
{
    private $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    public function index()
    {
        $feedbacks = $this->feedbackModel->getApprovedFeedbacks();
        require_once BASEPATH . 'views/feedback/index.php';
    }

    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $full_name = trim($_POST['full_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $rating = trim($_POST['rating'] ?? '');
            $message = trim($_POST['message'] ?? '');

            $data = [
                'full_name' => $full_name,
                'email' => $email,
                'rating' => $rating,
                'message' => $message,
                'full_name_err' => '',
                'email_err' => '',
                'rating_err' => '',
                'message_err' => ''
            ];

            // Full Name: only alphabets and spaces, min 3 characters
            if (empty($data['full_name'])) {
                $data['full_name_err'] = 'Full name is required.';
            } elseif (!preg_match("/^[A-Za-z ]{3,}$/", $data['full_name'])) {
                $data['full_name_err'] = 'Only letters and spaces allowed, minimum 3 characters.';
            }

            // Email validation
            if (empty($data['email'])) {
                $data['email_err'] = 'Email is required.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Enter a valid email address.';
            }

            // Rating validation
            if (empty($data['rating'])) {
                $data['rating_err'] = 'Rating is required.';
            } elseif (!in_array($data['rating'], ['1', '2', '3', '4', '5'])) {
                $data['rating_err'] = 'Invalid rating selected.';
            }

            // Message validation
            if (empty($data['message'])) {
                $data['message_err'] = 'Feedback message is required.';
            } elseif (strlen($data['message']) > 250) {
                $data['message_err'] = 'Message cannot exceed 250 characters.';
            }

            // Submit if valid
            if (
                empty($data['full_name_err']) &&
                empty($data['email_err']) &&
                empty($data['rating_err']) &&
                empty($data['message_err'])
            ) {
                $result = $this->feedbackModel->addFeedback($data);

                if ($result === true) {
                    flash('feedback_message', 'Feedback submitted successfully and pending approval.');
                    redirect('feedback/index');
                    exit;
                } elseif ($result === 'DUPLICATE_EMAIL') {
                    flash('feedback_message', 'This email has already submitted feedback.', 'alert alert-warning');
                } else {
                    flash('feedback_message', 'Something went wrong while submitting feedback.', 'alert alert-danger');
                }
            }
        } else {
            $data = [
                'full_name' => '',
                'email' => '',
                'rating' => '',
                'message' => '',
                'full_name_err' => '',
                'email_err' => '',
                'rating_err' => '',
                'message_err' => ''
            ];
        }

        require_once BASEPATH . 'views/feedback/submit.php';
    }
}
