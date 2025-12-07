<?php require_once 'views/layout/header.php'; ?>

<div class="card mt-4">
    <div class="card-header">
        <h4>Cập nhật sản phẩm: <?php echo $product['name']; ?></h4>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?page=products&action=update">
            <input type="hidden" name="id_product" value="<?php echo $product['id_product']; ?>">
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Danh mục</label>
                    <select name="id_category" class="form-select">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id_category']; ?>" <?php echo ($cat['id_category'] == $product['id_category']) ? 'selected' : ''; ?>>
                                <?php echo $cat['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Giá bán</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" value="<?php echo $product['quantity']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Màu sắc</label>
                    <input type="text" name="color" class="form-control" value="<?php echo $product['color']; ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bảo hành (tháng)</label>
                    <input type="number" name="warranty" class="form-control" value="<?php echo $product['warrantyperiod']; ?>">
                </div>
            </div>
            
            <a href="index.php?page=products" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>