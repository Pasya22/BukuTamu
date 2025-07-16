<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Data Buku Tamu</h2>
		
        <div>
			<a href="<?php echo site_url('auth/logout')?>" class="text-red-500 hover:underline">Logout</a>
        </div>
    </div>
	
    <form method="get" class="mb-4 flex space-x-2">
		<a href="<?php echo site_url('admin/create')?>" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Buku Tamu</a>
		<input type="text" name="date" placeholder="YYYY-MM-DD" class="border p-2 rounded" value="<?php echo $this->input->get('date')?>">
        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">Filter</button>
        <a href="<?php echo site_url('admin/export')?>" class="bg-green-600 text-white px-4 py-2 rounded">Export CSV</a>
    </form>

    <table class="w-full table-auto border border-collapse border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Pesan</th>
                <th class="border p-2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guests as $g): ?>
                <tr>
                    <td class="border p-2"><?php echo $g->name?></td>
                    <td class="border p-2"><?php echo $g->email?></td>
                    <td class="border p-2"><?php echo $g->message?></td>
                    <td class="border p-2"><?php echo $g->created_at?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
