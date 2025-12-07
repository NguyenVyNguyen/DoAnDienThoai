<?php require_once 'views/layout/header.php'; ?>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <?php echo isset($editCategory) ? 'Cập nhật danh mục' : 'Thêm danh mục mới'; ?>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=categories&action=<?php echo isset($editCategory) ? 'update' : 'store'; ?>">
                    <?php if(isset($editCategory)): ?>
                        <input type="hidden" name="id_category" value="<?php echo $editCategory['id_category']; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label>Tên danh mục</label>
                        <input type="text" name="name" class="form-control" required 
                               value="<?php echo isset($editCategory) ? $editCategory['name'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label>Thương hiệu (Brand)</label>
                        <input type="text" name="brand" class="form-control" 
                               value="<?php echo isset($editCategory) ? $editCategory['brand'] : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo isset($editCategory) ? 'Lưu cập nhật' : 'Thêm mới'; ?></button>
                    <?php if(isset($editCategory)): ?>
                        <a href="index.php?page=categories" class="btn btn-secondary">Hủy</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Danh sách danh mục</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $c): ?>
                        <tr>
                            <td><?php echo $c['id_category']; ?></td>
                            <td><?php echo $c['name']; ?></td>
                            <td><?php echo $c['brand']; ?></td>
                            <td>
                                <a href="index.php?page=categories&action=edit&id=<?php echo $c['id_category']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="index.php?page=categories&action=delete&id=<?php echo $c['id_category']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>