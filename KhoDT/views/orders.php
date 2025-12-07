<?php require_once 'views/layout/header.php'; ?>

<h2 class="mt-4">Quản lý đơn hàng</h2>
<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã HĐ</th>
                    <th>Ngày đặt</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $o): ?>
                <tr>
                    <td>#<?php echo $o['id_order']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($o['order_date'])); ?></td>
                    <td><?php echo $o['fullname']; ?></td>
                    <td class="fw-bold"><?php echo number_format($o['totalmoney'], 0, ',', '.'); ?>đ</td>
                    <td>
                        <?php 
                            $badge = 'bg-secondary';
                            if($o['status'] == 'Hoàn thành') $badge = 'bg-success';
                            if($o['status'] == 'Đang xử lý') $badge = 'bg-warning text-dark';
                            if($o['status'] == 'Đã hủy') $badge = 'bg-danger';
                        ?>
                        <span class="badge <?php echo $badge; ?>"><?php echo $o['status']; ?></span>
                    </td>
                    <td>
                        <a href="index.php?page=orders&action=detail&id=<?php echo $o['id_order']; ?>" class="btn btn-sm btn-info text-white">
                            <i class="fas fa-eye"></i> Chi tiết
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>