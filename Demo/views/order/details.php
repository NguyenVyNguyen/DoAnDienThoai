<h3 class="mb-4 text-uppercase fw-bold border-start border-4 border-primary ps-3">Lịch sử chi tiết mua hàng - <?php echo date('d/m/Y', strtotime($orderItems[0]['date'])); ?></h3>

<?php if (empty($orderItems)): ?>
    <div class="alert alert-light border-start border-4 border-info shadow-sm">
        <i class="fas fa-info-circle me-2 text-info"></i> Bạn chưa có đơn hàng nào.
    </div>
<?php else: ?>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-dark text-white" style="position: sticky; top: 0; z-index: 10;">
                    <tr>
                        <th class="py-3 ps-4 text-center">#</th>
                        <th class="py-3">Sản phẩm</th>
                        <th class="py-3 text-center">Số lượng</th>
                        <th class="py-3 text-end">Tổng tiền</th>
                        <th class="py-3 text-center pe-4">Trạng thái</th>
                        <th class="py-3 text-center pe-4">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                    $stt = 1;
                    $totalAllQuantity = 0; // Biến tính tổng số lượng
                    $totalAllMoney = 0;    // Biến tính tổng tiền

                    foreach ($orderItems as $order):
                        $totalAllQuantity += $order['quantitybuy'];
                        $subTotal = $order['price'] * $order['quantitybuy'];
                        $totalAllMoney += $subTotal;
                    ?>
                        <tr>
                            <td class="ps-4 text-center text-muted fw-bold"><?= $stt++ ?></td>
                            <td class="fw-bold text-primary">
                                <?php if (!empty($order['image']) && file_exists('../KhoDT/uploads/' . $order['image'])): ?>
                                    <img src="../KhoDT/uploads/<?php echo $order['image']; ?>" alt="<?= htmlspecialchars($order['name']) ?>" class="me-2" style="width: 50px; height: 50px; object-fit: contain;">
                                <?php else: ?>
                                    <span class="text-muted small">Không ảnh</span>
                                <?php endif; ?>
                                <?= htmlspecialchars($order['name']) ?>
                            </td>
                            <td class="text-center font-monospace">
                                <?= number_format($order['quantitybuy']) ?>
                            </td>
                            <td class="text-end fw-bold">
                                <?= number_format($order['price'], 0, ',', '.') ?>đ
                            </td>
                            <td class="text-center pe-4">
                                <?php
                                $statusClass = 'bg-secondary';
                                $status = strtolower($order['status']);
                                if (strpos($status, 'thành công') !== false) $statusClass = 'bg-success';
                                elseif (strpos($status, 'hủy') !== false) $statusClass = 'bg-danger';
                                elseif (strpos($status, 'chờ') !== false) $statusClass = 'bg-warning text-dark';
                                ?>
                                <span class="badge rounded-pill <?= $statusClass ?> px-3 py-2" style="font-size: 0.75rem;">
                                    <?= htmlspecialchars($order['status']) ?>
                                </span>
                            </td>
                            <td class="text-center pe-4">
                                <?php if (strpos($status, 'pending') !== false): ?>
                                    <a href="index.php?c=orderdetails&a=cancel&id_order=<?= $order['id_order'] ?>&id_product=<?= $order['id_product'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc muốn huỷ đơn hàng này không?')">Huỷ</a>
                                <?php else: ?>
                                    <span class="text-muted small">Không thể huỷ</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="bg-light fw-bold" style="position: sticky; bottom: 0; z-index: 10; border-top: 2px solid #dee2e6;">
                    <tr>
                        <td colspan="2" class="text-end py-3 ps-4 text-uppercase">Tổng cộng tất cả:</td>
                        <td class="text-center py-3 text-primary" style="font-size: 1.1rem;">
                            <?= number_format($totalAllQuantity) ?>
                        </td>
                        <td class="text-end py-3 text-danger" style="font-size: 1.1rem;">
                            <?= number_format($totalAllMoney, 0, ',', '.') ?>đ
                        </td>
                        <td> </td>
                        <td>
                            <a href="index.php?c=orderdetails" class="btn btn-sm btn-outline-primary ms-2">Quay lại</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endif; ?>