<?php
if (isset($error)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($error) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
<?php }
?>
<div class="row justify-content-center py-5">
    <div class="col-lg-8">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header border-0 p-0" style="height: 120px; background: linear-gradient(45deg, #1a1a1a, #4a4a4a);">
            </div>

            <div class="card-body p-4 p-md-5 position-relative">
                <div class="text-center" style="margin-top: -80px;">
                    <div class="d-inline-block position-relative">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg border border-4 border-white"
                            style="width: 120px; height: 120px; font-size: 3rem; font-weight: bold;">
                            <?= strtoupper(substr($user['fullname'], 0, 1)) ?>
                        </div>
                    </div>
                </div>
                <h3 class="mt-3 fw-bold mb-4 text-center">Đổi mật khẩu</h3>
                <form action="index.php?c=user&a=editpass" method="post">
                    <div class="mb-4">
                        <label for="current_password" class="form-label fw-bold">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="form-label fw-bold">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label fw-bold">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Lưu thay đổi</button>
                    <a href="index.php?c=user&a=profile" class="btn btn-secondary rounded-pill px-4 ms-2">Hủy</a>
                </form>

            </div>
        </div>
    </div>
</div>