<?php
class BaseController {
    // Hàm này giúp ghép Header + Nội dung + Footer lại với nhau
    protected function render($viewPath, $data = []) {
        extract($data);
        
        ob_start();
        require_once "views/$viewPath.php";
        $content = ob_get_clean();

        require_once "views/layouts/header.php";
        echo $content;
        require_once "views/layouts/footer.php";
    }
}
?>