<?php require_once 'views/layout/header.php'; ?>
    <main class="container mx-auto px-4 py-8 min-h-screen max-w-4xl">
        <h2 class="text-2xl font-bold mb-6">Lịch sử đơn hàng</h2>
        <div id="orders-list" class="space-y-4"></div>
        <div class="mt-8 text-center">
             <button onclick="clearHistory()" class="text-sm text-red-500 hover:underline">Xóa lịch sử đơn hàng</button>
        </div>
    </main>
<?php require_once 'views/layout/footer.php'; ?>