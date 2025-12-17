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
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $model = new UserModel();
            $user = $model->login($username, $pass);
            if ($user) {
                $_SESSION['user'] = $user;

                // Gắn active page
                $_SESSION['active_page'] = 'home';

                header('Location: index.php');
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
        header('Location: index.php?c=user');
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

    public function logup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password'];

            $model = new UserModel();
            $user = $model->logup($fullname, $username, $email, $phone, $pass);


            if ($user) {
                $_SESSION['user'] = $user;

                // Gắn active page
                $_SESSION['active_page'] = 'home';

                header('Location: index.php');
            } else {
                $error = "Sai thông tin đăng ký!";
                $this->render('user/logup', ['error' => $error]);
            }
        } else {
            // Gắn active page
            $_SESSION['active_page'] = 'logup';
            $this->render('user/logup', ['title' => 'Đăng ký']);
        }
    }

    public function loginerror()
    {
        // Gắn active page
        $_SESSION['active_page'] = 'login';

        $this->render('user/login', [
            'title' => 'Đăng nhập',
            'message' => 'Phải đăng nhập mới có thể thực hiện thao tác này.'
        ]);
    }
}
