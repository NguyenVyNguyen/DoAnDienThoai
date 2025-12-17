<h2 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Giỏ hàng của bạn</h2>

<?php if (empty($cartItems)): ?>
    <div class="text-center py-5 bg-white rounded shadow-sm">
        <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
        <p class="lead">Giỏ hàng đang trống!</p>
        <a href="index.php" class="btn btn-primary rounded-pill px-4">Quay lại mua sắm</a>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= htmlspecialchars($item['name']) ?></div>
                                            <small class="text-muted"><?= $item['color'] ?></small>
                                        </td>
                                        <td><?= number_format($item['price']) ?>đ</td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark border p-2"><?= $item['qty'] ?></span>
                                        </td>
                                        <td class="fw-bold text-primary"><?= number_format($item['total']) ?>đ</td>
                                        <td>
                                            <a href="index.php?c=cart&a=delete&id=<?= $item['id_product'] ?>" class="text-danger" onclick="return confirm('Xóa sản phẩm này?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-3 mt-lg-0">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tổng đơn hàng</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Tạm tính:</span>
                        <span class="fw-bold"><?= number_format($totalMoney) ?>đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="h5">Thành tiền:</span>
                        <span class="h5 text-danger"><?= number_format($totalMoney) ?>đ</span>
                    </div>
                    <a href="index.php?c=cart&a=success" class="btn btn-success w-100 rounded-pill py-2 fw-bold">THANH TOÁN NGAY</a>
                    <a href="index.php" class="btn btn-outline-secondary w-100 rounded-pill py-2 mt-2">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>