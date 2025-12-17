<?php
if (isset($message)) { ?>
    <div class="alert alert-info border-0 shadow-sm rounded-3 d-flex align-items-center" role="alert">
        <i class="fas fa-info-circle me-2"></i>
        <div><?= htmlspecialchars($message) ?></div>
    </div>
<?php } ?>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header border-0 py-4 text-center" style="background: linear-gradient(45deg, #1a1a1a, #4a4a4a);">
                <h3 class="text-white fw-bold mb-0 text-uppercase tracking-wider">Đăng Nhập</h3>
                <small class="text-white-50">Chào mừng bạn trở lại với Tech Store</small>
            </div>

            <div class="card-body p-4 p-sm-5">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 shadow-sm rounded-3 d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div><?= htmlspecialchars($error) ?></div>
                    </div>
                <?php endif; ?>

                <form action="index.php?c=user&a=login" method="POST">
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Tên đăng nhập</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" name="username" class="form-control bg-light border-start-0 ps-0"
                                placeholder="Nhập username của bạn" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label fw-bold text-secondary">Mật khẩu</label>
                            <!-- <a href="#" class="text-decoration-none small text-primary">Quên mật khẩu?</a> -->
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-start-0 ps-0"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label text-muted small" for="rememberMe">Ghi nhớ đăng nhập</label>
                    </div> -->

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm transition-all">
                        ĐĂNG NHẬP NGAY <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </form>

                <div class="text-center mt-4">
                    <p class="text-muted small">Bạn chưa có tài khoản?
                        <a href="index.php?c=user&a=logup" class="fw-bold text-primary text-decoration-none">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hiệu ứng hover cho nút bấm */
    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #004fb1);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4) !important;
    }

    .input-group-text,
    .form-control {
        border-color: #eee;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #0d6efd;
        background-color: #fff !important;
    }
</style>