<?php require_once 'views/layout/header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Cập nhật thông tin người dùng</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=users&action=update">
                    <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập (Username)</label>
                        <input type="text" class="form-control" value="<?php echo $user['username']; ?>" disabled readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" value="<?php echo $user['fullname']; ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Đổi mật khẩu mới</label>
                        <input type="password" name="password" class="form-control" placeholder="Để trống nếu không muốn thay đổi mật khẩu">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai trò</label>
                        <select name="role" class="form-select">
                            <option value="0" <?php echo ($user['role'] == 0) ? 'selected' : ''; ?>>Khách hàng / Nhân viên</option>
                            <option value="1" <?php echo ($user['role'] == 1) ? 'selected' : ''; ?>>Quản trị viên (Admin)</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php?page=users" class="btn btn-secondary">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>