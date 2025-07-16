<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Buku Tamu</h1>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?= validation_errors('<div class="bg-red-100 text-red-700 p-2 rounded mb-4">', '</div>') ?>

    <form method="post">
        <div class="mb-4">
            <label class="block font-semibold">Nama</label>
            <input type="text" name="name" class="w-full border border-gray-300 rounded p-2" value="<?= set_value('name') ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded p-2" value="<?= set_value('email') ?>">
        </div>
        <div class="mb-4">
            <label class="block font-semibold">Pesan</label>
            <textarea name="message" class="w-full border border-gray-300 rounded p-2"><?= set_value('message') ?></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kirim</button>
    </form>
</div>
