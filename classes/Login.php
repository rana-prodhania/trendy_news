<?php
require_once '../lib/Database.php';
require_once '../helpers/Format.php';

class Login
{
    public $db;
    private $format;

    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
        session_start();
    }

    public function login($data)
    {
        $email = $this->format->sanitize($data['email']);
        $password = $this->format->sanitize($data['password']);

        if (empty($email) || empty($password)) {
            return "All fields are required!";
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }

        // if(strlen($password) < 6) {
        //     return "Password must be at least 6 characters!";
        // }


        $query = "SELECT * FROM admins WHERE email = ?";
        $stmt = $this->db->query($query, [$email]);
        
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $result['password'])) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['name'] = $result['name'];
                $this->db->close();
                header('Location: dashboard.php');
                exit();
            } else {
                $this->db->close();
                return "Incorrect password!";
            }
        } else {
            $this->db->close();
            return "Incorrect email or password!";
        }
    }
}
