<?php
class UserController extends BaseController {
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $_POST['phone'];
            $pass = $_POST['password'];
            
            $model = new UserModel();
            $user = $model->login($phone, $pass);
            
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?c=user&a=profile');
            } else {
                $error = "Sai số điện thoại hoặc mật khẩu!";
                $this->render('user/login', ['error' => $error]);
            }
        } else {
            $this->render('user/login');
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    public function profile() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=user&a=login');
            exit;
        }
        
        // Lấy lại thông tin mới nhất từ DB
        $model = new UserModel();
        $user = $model->getProfile($_SESSION['user']['user_id']);
        
        $this->render('user/profile', ['user' => $user]);
    }
}
?>