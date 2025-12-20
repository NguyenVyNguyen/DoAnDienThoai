<?php
// echo '<pre>';
var_dump($_SESSION['cart']);
?>
<h2 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Giỏ hàng của bạn</h2>
<?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_quantity'): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Số lượng sản phẩm không hợp lệ.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<form action="index.php?c=cart&a=update" method="post">
    <button type="submit" class="btn btn-primary rounded-pill px-4" name="update_cart">Cập nhật giỏ hàng</button>
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
                                            <!-- <td>
                                                <div class="fw-bold"><?= htmlspecialchars($item['id_product']) ?></div>
                                            </td> -->
                                            <td>
                                                <div class="fw-bold">
                                                    <?php if (!empty($item['image']) && file_exists('../KhoDT/uploads/' . $item['image'])): ?>
                                                        <img src="../KhoDT/uploads/<?php echo $item['image']; ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="me-2" style="width: 50px; height: 50px; object-fit: contain;">
                                                    <?php else: ?>
                                                        <span class="text-muted small">Không ảnh</span>
                                                    <?php endif; ?>
                                                    <?= htmlspecialchars($item['name']) ?>
                                                </div>
                                                <small class="text-muted"><?= $item['color'] ?></small>
                                            </td>
                                            <td><?= number_format($item['price']) ?>đ</td>
                                            <td class="text-center">
                                                <input type="number" name="quantity[<?= $item['id_product'] ?>]" class="form-control d-inline-block w-25 text-center" value="<?= $item['qty'] ?>" min="1">
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

</form>