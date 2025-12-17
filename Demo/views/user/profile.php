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
                        <span class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle p-2" title="Đang trực tuyến"></span>
                    </div>
                    <h3 class="mt-3 fw-bold mb-1">Xin chào, <?= htmlspecialchars($user['fullname']) ?></h3>
                    <p class="text-muted small">Thành viên thân thiết của TechStore</p>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                            <div class="icon-box bg-white shadow-sm rounded-3 p-3 me-3 text-primary">
                                <i class="fas fa-user-tag fa-fw"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Tên đăng nhập</small>
                                <span class="fw-bold"><?= htmlspecialchars($user['username']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                            <div class="icon-box bg-white shadow-sm rounded-3 p-3 me-3 text-primary">
                                <i class="fas fa-envelope fa-fw"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Địa chỉ Email</small>
                                <span class="fw-bold"><?= htmlspecialchars($user['email']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                            <div class="icon-box bg-white shadow-sm rounded-3 p-3 me-3 text-primary">
                                <i class="fas fa-phone-alt fa-fw"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Số điện thoại</small>
                                <span class="fw-bold"><?= htmlspecialchars($user['phone']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-3 bg-light d-flex align-items-center">
                            <div class="icon-box bg-white shadow-sm rounded-3 p-3 me-3 text-primary">
                                <i class="fas fa-shield-alt fa-fw"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Trạng thái tài khoản</small>
                                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill">Đã xác minh</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 justify-content-center mt-4">
                    <a href="index.php" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="fas fa-home me-2"></i>Trang chủ
                    </a>
                    <a href="index.php?c=orderdetails" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="fas fa-shopping-bag me-2"></i>Lịch sử mua hàng
                    </a>
                    <!-- <button class="btn btn-light rounded-pill px-4 border">
                        <i class="fas fa-user-edit me-2"></i>Chỉnh sửa hồ sơ
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hiệu ứng Icon Box */
    .icon-box {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        transition: all 0.3s ease;
    }

    /* Responsive cho mobile */
    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem !important;
        }
    }
</style>