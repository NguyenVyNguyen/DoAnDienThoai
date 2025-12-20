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
        unset($_SESSION['cart']);
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

    public function edit()
    {
        if (!isset($_SESSION['user'])) {
            // Gắn active page
            $_SESSION['active_page'] = 'login';

            // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
            header('Location: index.php?c=user&a=login');
            exit;
        }

        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $_SESSION['user']['id_user'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $updated = $model->updateProfile($id_user, $fullname, $email, $phone);
            if ($updated) {
                // Cập nhật thông tin trong session
                $_SESSION['user'] = $model->getProfile($id_user);

                header('Location: index.php?c=user&a=profile');
                exit;
            } else {
                $error = "Cập nhật thất bại!";
                $this->render('user/edit', ['error' => $error]);
            }
        } else {
            // Gắn active page
            $_SESSION['active_page'] = 'profile';

            // Lấy thông tin người dùng hiện tại
            $user = $model->getProfile($_SESSION['user']['id_user']);
            $this->render('user/edit', ['user' => $user, 'title' => 'Chỉnh sửa hồ sơ']);
        }
    }

    public function editpass()
    {
        if (!isset($_SESSION['user'])) {
            // Gắn active page
            $_SESSION['active_page'] = 'login';

            // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
            header('Location: index.php?c=user&a=login');
            exit;
        }

        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $_SESSION['user']['id_user'];
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];

            $changed = $model->changePassword($id_user, $current_password, $new_password);
            if ($changed) {
                header('Location: index.php?c=user&a=profile');
                exit;
            } else {
                $error = "Đổi mật khẩu thất bại! Mật khẩu hiện tại không đúng.";
                $this->render('user/editpass', ['error' => $error]);
            }
        } else {
            // Gắn active page
            $_SESSION['active_page'] = 'profile';


            // Lấy thông tin người dùng hiện tại
            $user = $model->getProfile($_SESSION['user']['id_user']);
            $this->render('user/editpass', ['user' => $user, 'title' => 'Đổi mật khẩu']);
        }
    }
}
