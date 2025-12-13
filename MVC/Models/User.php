<?php

class User
{
    public int $id_user;
    public string $username;
    public string $password;
    public string $email;
    public string $phone;
    public string $fullname;
    public string $role;

    public function __construct(
        int $id_user,
        string $username,
        string $password,
        string $email,
        string $phone,
        string $fullname,
        string $role
    ) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->fullname = $fullname;
        $this->role = $role;
    }
    // ===== Getter =====
    public function getIdUser(): int {
        return $this->id_user;
    }
    public function getUsername(): string {
        return $this->username;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getPhone(): string {
        return $this->phone;
    }
    public function getFullname(): string {
        return $this->fullname;
    }
    public function getRole(): string {
        return $this->role;
    }
}
