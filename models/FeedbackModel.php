<?php
require_once 'Database.php';

class FeedbackModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addFeedback($data)
    {
        $this->db->query('INSERT INTO feedback (full_name, email, rating, message) VALUES (:full_name, :email, :rating, :message)');

        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':message', $data['message']);

        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return 'DUPLICATE_EMAIL';
            }
            return false;
        }
    }

    public function getApprovedFeedbacks()
    {
        $this->db->query('SELECT * FROM feedback WHERE status = "approved" ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getAllFeedbacks()
    {
        $this->db->query('SELECT * FROM feedback ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function updateFeedbackStatus($id, $status)
    {
        $this->db->query('UPDATE feedback SET status = :status WHERE id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function checkEmailExists($email)
    {
        $this->db->query('SELECT id FROM feedback WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return ($row) ? true : false;
    }
}
?>