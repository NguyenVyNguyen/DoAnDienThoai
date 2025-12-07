<?php require_once 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <h2>Quản lý sản phẩm</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#productModal">
        <i class="fas fa-plus"></i> Thêm mới
    </button>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Tìm kiếm tên sản phẩm...">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Tìm</button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Màu sắc</th>
                    <th>Giá bán</th>
                    <th>Tồn kho</th>
                    <th>Bảo hành</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                    <tr>
                        <td>#<?php echo $p['id_product']; ?></td>
                        <td>
                            <strong><?php echo $p['name']; ?></strong>
                        </td>
                        <td><?php echo $p['cat_name']; ?></td>
                        <td><?php echo $p['color']; ?></td>
                        <td class="text-primary fw-bold"><?php echo number_format($p['price'], 0, ',', '.'); ?>đ</td>
                        <td>
                            <?php if($p['quantity'] < 10): ?>
                                <span class="badge bg-danger"><?php echo $p['quantity']; ?></span>
                            <?php else: ?>
                                <span class="badge bg-success"><?php echo $p['quantity']; ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $p['warrantyperiod']; ?> tháng</td>
                        <td>
                            <a href="index.php?page=products&action=edit&id=<?php echo $p['id_product']; ?>" 
                               class="btn btn-sm btn-outline-primary" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="index.php?page=products&action=delete&id=<?php echo $p['id_product']; ?>" 
                               class="btn btn-sm btn-outline-danger" 
                               onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')" title="Xóa">
                               <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center">Chưa có sản phẩm nào.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="index.php?page=products&action=store">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm sản phẩm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Danh mục</label>
                            <select name="id_category" class="form-select">
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?php echo $cat['id_category']; ?>">
                                        <?php echo $cat['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Giá bán</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số lượng nhập</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Màu sắc</label>
                            <input type="text" name="color" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bảo hành (tháng)</label>
                            <input type="number" name="warranty" class="form-control" value="12">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>