<h2 class="mb-4">Lịch sử mua hàng</h2>
<?php if (empty($orderDetails)): ?>
    <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
<?php else: ?>
    <table class="table table-bordered table-striped table-hover bg-white text-center align-middle">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Ngày mua</th>
                <th>Số lượng mua</th>
                <th>Tổng tiền</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['id_order']) ?></td>
                    <td><?= htmlspecialchars($order['name']) ?></td>
                    <td><?= htmlspecialchars($order['date']) ?></td>
                    <td><?= number_format($order['quantitybuy']) ?></td>
                    <td><?= number_format($order['price'] * $order['quantitybuy']) ?>đ</td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>