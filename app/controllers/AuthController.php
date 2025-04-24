<?php

class AuthController {

    public function login($username, $password) {
        // echo $username ;
        // echo $password ;
        $user = Users::findByUsername($username);
        if ($user && password_verify($password, $user->getPassword())) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user->getUserId();
            header('Location: /ABS-ISTA/absence/filiereView');
            exit();
        } else {
            $this->redirectToLogin('Invalid credentials ');
        }
    }

    public static function isAuthenticated() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        require_once __DIR__ . '/../views/auth/login.php'; // Corrected path
        exit();
    }

    // Redirect to the login view
    public function redirectToLogin($error = null) {
        if (is_array($error)) {
            $error = null; // Handle route calls with no parameters
        }
        if ($error) {
            header('Location: /ABS-ISTA/login?error=' . urlencode($error));
        } else {
            require_once __DIR__ . '/../views/auth/login.php'; // Fixed path
        }
        exit();
    }

    // Render the add user view
    public function addUserView() {
        require_once __DIR__ . '/../views/user/add.php';
        exit();
    }

    
    public function createUser($username, $password, $role) {
        if (Users::findByUsername($username)) {
            echo "Error: Username already exists.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new Users(null, $username, $hashedPassword, $role);
        $user->create($user);
        $this->redirectToLogin('User created successfully. Please log in.');
    }

     

}
