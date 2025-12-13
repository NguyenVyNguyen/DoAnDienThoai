<?php require_once 'views/layout/header.php'; ?>
    <main class="container mx-auto px-4 py-8 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Thông tin tài khoản</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 pb-2 border-b">Hồ sơ cá nhân</h3>
                        <div class="flex items-start gap-6 mb-6">
                            <div class="flex-shrink-0 text-center">
                                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-2 mx-auto overflow-hidden"><span class="text-3xl font-bold text-gray-500">H</span></div>
                                <button class="text-xs text-blue-600 hover:underline">Đổi ảnh đại diện</button>
                            </div>
                            <div class="flex-1 space-y-3">
                                <div><label class="block text-sm font-medium text-gray-500 mb-1">Họ và tên</label><input type="text" value="Nguyễn Thị Hiền" class="w-full border rounded px-3 py-2"></div>
                                <div><label class="block text-sm font-medium text-gray-500 mb-1">Email</label><input type="email" value="hien.nguyen@gmail.com" class="w-full border rounded px-3 py-2 bg-gray-50" disabled></div>
                                <div><label class="block text-sm font-medium text-gray-500 mb-1">Số điện thoại</label><input type="text" value="0912345678" class="w-full border rounded px-3 py-2"></div>
                                <div><label class="block text-sm font-medium text-gray-500 mb-1">Địa chỉ</label><textarea class="w-full border rounded px-3 py-2" rows="2">123 Đường Cầu Giấy, Hà Nội</textarea></div>
                            </div>
                        </div>
                        <div class="flex justify-end"><button onclick="saveInfo()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition shadow">Lưu thay đổi</button></div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 pb-2 border-b">Đổi mật khẩu</h3>
                        <form onsubmit="changePassword(event)" class="space-y-4">
                            <div><label class="block text-sm font-medium text-gray-600 mb-1">Mật khẩu hiện tại</label><input type="password" required class="w-full border rounded px-3 py-2"></div>
                            <div><label class="block text-sm font-medium text-gray-600 mb-1">Mật khẩu mới</label><input type="password" id="new-pass" required class="w-full border rounded px-3 py-2"></div>
                            <div><label class="block text-sm font-medium text-gray-600 mb-1">Xác nhận mật khẩu</label><input type="password" id="confirm-pass" required class="w-full border rounded px-3 py-2"></div>
                            <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-700 transition">Cập nhật mật khẩu</button>
                        </form>
                    </div>
                    <div class="mt-6"><button onclick="alert('Đã đăng xuất!')" class="w-full border border-red-200 text-red-600 bg-red-50 py-2 rounded hover:bg-red-100 transition">Đăng xuất</button></div>
                </div>
            </div>
        </div>
    </main>
<?php require_once 'views/layout/footer.php'; ?>