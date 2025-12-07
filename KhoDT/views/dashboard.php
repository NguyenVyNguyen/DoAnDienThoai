<?php require_once 'views/layout/header.php'; ?>

<h2 class="mt-4">Tổng quan kho hàng</h2>
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card-counter bg-primary text-white">
            <i class="fas fa-mobile-alt"></i>
            <span class="count-numbers"><?php echo $total_products; ?></span>
            <span class="count-name">Sản phẩm</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-counter bg-success text-white">
            <i class="fas fa-file-invoice-dollar"></i>
            <span class="count-numbers"><?php echo $total_orders; ?></span>
            <span class="count-name">Đơn hàng</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-counter bg-info text-white">
            <i class="fas fa-users"></i>
            <span class="count-numbers"><?php echo $total_customers; ?></span>
            <span class="count-name">Khách hàng</span>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>