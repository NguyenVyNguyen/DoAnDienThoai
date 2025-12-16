<?php
require_once 'controllers/BaseController.php';
require_once 'models/UserModel.php';
class UserController extends BaseController
{
    public function index()
    {
        // Gắn active page
        $_SESSION['active_page'] = 'login';

        $this->render('user/login', ['title' => 'Đăng nhập']);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $_POST['phone'];
            $pass = $_POST['password'];

            $model = new UserModel();
            $user = $model->login($phone, $pass);

            if ($user) {
                $_SESSION['user'] = $user;

                // Gắn active page
                $_SESSION['active_page'] = 'profile';

                header('Location: index.php?c=user&a=profile');
            } else {
                $error = "Sai số điện thoại hoặc mật khẩu!";
                $this->render('user/login', ['error' => $error]);
            }
        } else {
            $this->render('user/login', ['title' => 'Đăng nhập']);
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            // Gắn active page
            $_SESSION['active_page'] = 'login';

            // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
            header('Location: index.php?c=user&a=login');
            exit;
        }

        // Lấy lại thông tin mới nhất từ DB
        $model = new UserModel();
        $user = $model->getProfile($_SESSION['user']['id_user']);

        // Gắn active page
        $_SESSION['active_page'] = 'profile';

        $this->render('user/profile', ['user' => $user]);
    }
}
