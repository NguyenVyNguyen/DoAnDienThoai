<?php require_once 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <h2>Quản lý người dùng</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="fas fa-user-plus"></i> Thêm thành viên
    </button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Username</th>
                    <th>Liên hệ</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td>#<?php echo $u['id_user']; ?></td>
                    <td><?php echo $u['fullname']; ?></td>
                    <td><?php echo $u['username']; ?></td>
                    <td>
                        <small>Email: <?php echo $u['email']; ?></small><br>
                        <small>SĐT: <?php echo $u['phone']; ?></small>
                    </td>
                    <td>
                        <?php if ($u['role'] == 1): ?>
                            <span class="badge bg-primary">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Khách hàng</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?page=users&action=edit&id=<?php echo $u['id_user']; ?>" class="btn btn-sm btn-outline-primary" title="Sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php if($u['id_user'] != 1): ?>
                        <a href="index.php?page=users&action=delete&id=<?php echo $u['id_user']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa người dùng này?')" title="Xóa">
                            <i class="fas fa-trash"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?page=users&action=store">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thành viên mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Vai trò</label>
                            <select name="role" class="form-select">
                                <option value="0">Khách hàng / Nhân viên</option>
                                <option value="1">Quản trị viên (Admin)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>