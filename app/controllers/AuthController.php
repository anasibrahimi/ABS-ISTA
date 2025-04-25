<?php

class AuthController {

    public function login($username, $password) {
        
        $user = Users::findByUsername($username);
        if ($user && password_verify($password, $user->getPassword())) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user->getUserId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['role'] = $user->getRole();
            header('Location: /ABS-ISTA/dashboard');
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

    //get gestion users view 
    public function usersView() {
        $users = Users::findAll(); // Fetch all users
        require_once __DIR__ . '/../views/auth/gestion-users.php';
        exit();
    }

    // Render the add user view
    public function addUserView() {
        require_once __DIR__ . '/../views/auth/addUserForm.php';
        exit();
    }

    
    public function createUser() {
        if (Users::findByUsername($_POST['username'])) {
            echo "Error: Username already exists.";
            return;
        }
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT); // Fixed extra $
        $user = new Users();
        $user->setUsername($_POST['username']); // Fixed extra $
        $user->setPassword($hashedPassword);
        $user->setRole($_POST['role']); // Fixed extra $
        $user->create($user);
        header('Location: /ABS-ISTA/users?message=' . urlencode('User created successfully.'));
        exit();
    }

    public function deleteUser() {
             $user = new Users ;
            $user->delete($_POST['user_id']);
            header('Location: /ABS-ISTA/users?message=' . urlencode('User deleted successfully.'));
        exit();
    }

}
