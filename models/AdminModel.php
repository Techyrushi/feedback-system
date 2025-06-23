<?php
require_once 'Database.php';

class AdminModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function login($username, $password) {
        $this->db->query('SELECT * FROM admins WHERE username = :username');
        $this->db->bind(':username', $username);
        
        $row = $this->db->single();
        
        if($row) {
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            }
        }
        return false;
    }
}
?>