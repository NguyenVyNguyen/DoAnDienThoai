<div class="row justify-content-center align-items-center py-5" style="min-height: 90vh;">
    <div class="col-md-7 col-lg-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header border-0 py-4 text-center" style="background: linear-gradient(45deg, #1a1a1a, #4a4a4a);">
                <h3 class="text-white fw-bold mb-0 text-uppercase">Tạo Tài Khoản</h3>
                <small class="text-white-50">Gia nhập cộng đồng công nghệ Tech Store ngay hôm nay</small>
            </div>

            <div class="card-body p-4 p-md-5">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 shadow-sm rounded-3 d-flex align-items-center mb-4">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div><?= htmlspecialchars($error) ?></div>
                    </div>
                <?php endif; ?>

                <form action="index.php?c=user&a=logup" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold text-secondary">Họ và tên</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-id-card text-muted"></i></span>
                                <input type="text" name="fullname" class="form-control bg-light border-start-0"
                                    placeholder="Ví dụ: Nguyễn Văn A" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user-tag text-muted"></i></span>
                                <input type="text" name="username" class="form-control bg-light border-start-0"
                                    placeholder="username123" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Số điện thoại</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone text-muted"></i></span>
                                <input type="text" name="phone" class="form-control bg-light border-start-0"
                                    placeholder="09xx..." required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold text-secondary">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0"
                                    placeholder="email@example.com" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold text-secondary">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-muted"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0"
                                    placeholder="Tối thiểu 6 ký tự" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-3 mt-2 btn-signup">
                        TẠO TÀI KHOẢN NGAY <i class="fas fa-user-plus ms-2"></i>
                    </button>

                    <div class="text-center mt-3">
                        <span class="text-muted small">Đã có tài khoản?</span>
                        <a href="index.php?c=user&a=login" class="fw-bold text-primary text-decoration-none small ms-1">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS bổ sung để đồng bộ trải nghiệm */
    .input-group-text {
        border-color: #f1f1f1;
        color: #6c757d;
    }

    .form-control {
        border-color: #f1f1f1;
        padding: 10px;
    }

    .form-control:focus {
        background-color: #fff !important;
        border-color: #0d6efd;
        box-shadow: none;
    }

    .btn-signup {
        background: linear-gradient(45deg, #0d6efd, #004fb1);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-signup:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4) !important;
        background: linear-gradient(45deg, #004fb1, #0d6efd);
    }
</style>