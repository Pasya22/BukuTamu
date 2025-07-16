<div class="max-w-sm mx-auto mt-20 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Login Admin</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-4">
            <label class="block font-semibold">Username</label>
            <input type="text" name="username" class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 rounded p-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
    </form>
</div>
