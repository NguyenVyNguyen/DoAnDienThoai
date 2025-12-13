<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary text-white">Đăng Nhập</div>
            <div class="card-body">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form action="index.php?c=user&a=login" method="POST">
                    <div class="mb-3">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" placeholder="0909123456" required>
                    </div>
                    <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>