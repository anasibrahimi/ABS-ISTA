<?php

class UserModel {
    

    public function authenticate(string $username, string $password): array|false {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            SELECT user_id, username, password, role
              FROM users
             WHERE username = ?
        ");
        $stmt->execute([$username]);
        $u = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($u && $u['password'] === $password) {
            return $u;
        }
        return false;
    }

    public function getUsernameById(int $id): string {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("SELECT username FROM users WHERE user_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn() ?: 'Utilisateur';
    }
}
