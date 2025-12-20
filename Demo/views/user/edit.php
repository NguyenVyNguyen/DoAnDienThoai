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
                <h3 class="mt-3 fw-bold mb-4 text-center">Chỉnh sửa thông tin cá nhân</h3>
                <form action="index.php?c=user&a=edit" method="post">
                    <div class="mb-4">
                        <label for="fullname" class="form-label fw-bold">Họ và tên</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">Địa chỉ Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label fw-bold">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill px-4">Lưu thay đổi</button>
                    <a href="index.php?c=user&a=profile" class="btn btn-secondary rounded-pill px-4 ms-2">Hủy</a>

                    <a href="index.php?c=user&a=editpass" class="btn btn-secondary rounded-pill px-4 ms-2">Đổi mật khẩu</a>
                </form>
            </div>
        </div>
    </div>
</div>