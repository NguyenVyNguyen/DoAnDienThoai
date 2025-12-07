<?php require_once 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4">
    <h3>Chi tiết đơn hàng #<?php echo $order['id_order']; ?></h3>
    <a href="index.php?page=orders" class="btn btn-secondary">Quay lại</a>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <div class="card mb-3">
    <div class="card-header bg-primary text-white">Thông tin khách hàng</div>
    <div class="card-body">
        <p><strong>Họ tên:</strong> <?php echo $order['fullname']; ?></p>
        <p><strong>SĐT:</strong> <?php echo $order['phone']; ?></p>
        
        <p><strong>Ngày đặt:</strong> <?php echo isset($order['order_date']) ? date('d/m/Y', strtotime($order['order_date'])) : 'N/A'; ?></p>
    </div>
</div>

        <div class="card">
            <div class="card-header bg-warning text-dark">Cập nhật trạng thái</div>
            <div class="card-body">
                <form method="POST" action="index.php?page=orders&action=update_status">
                    <input type="hidden" name="id_order" value="<?php echo $order['id_order']; ?>">
                    <select name="status" class="form-select mb-3">
                        <option value="Đang xử lý" <?php echo ($order['status']=='Đang xử lý')?'selected':''; ?>>Đang xử lý</option>
                        <option value="Đang giao hàng" <?php echo ($order['status']=='Đang giao hàng')?'selected':''; ?>>Đang giao hàng</option>
                        <option value="Hoàn thành" <?php echo ($order['status']=='Hoàn thành')?'selected':''; ?>>Hoàn thành</option>
                        <option value="Đã hủy" <?php echo ($order['status']=='Đã hủy')?'selected':''; ?>>Đã hủy</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Sản phẩm đã mua</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $d): ?>
                        <tr>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo number_format($d['price'], 0, ',', '.'); ?>đ</td>
                            <td class="text-center"><?php echo $d['quantitybuy']; ?></td>
                            <td class="text-end fw-bold">
                                <?php echo number_format($d['price'] * $d['quantitybuy'], 0, ',', '.'); ?>đ
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr class="table-light">
                            <td colspan="3" class="text-end fw-bold">TỔNG CỘNG:</td>
                            <td class="text-end fw-bold text-danger fs-5">
                                <?php echo number_format($order['totalmoney'], 0, ',', '.'); ?>đ
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>