<div class="card">
    <div class="card-header">Thông tin tài khoản</div>
    <div class="card-body">
        <h4 class="card-title">Xin chào, <?= htmlspecialchars($user['fullname']) ?></h4>
        <ul class="list-group list-group-flush mt-3">
            <li class="list-group-item"><strong>Username:</strong> <?= $user['username'] ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?= $user['email'] ?></li>
            <li class="list-group-item"><strong>Số điện thoại:</strong> <?= $user['phone'] ?></li>
        </ul>
        <div class="mt-3">
            <a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a>
        </div>
    </div>
</div>