<div class="ml-64 p-6" id="content">
    <h1 class="text-2xl font-bold mb-6 text-center">Select a Filiere</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php foreach ($filieres as $filiere): ?>
            <div class="block bg-blue-500 text-white text-center py-4 rounded shadow hover:bg-blue-600 no-underline mb-4">
                <h2 class="text-lg font-bold"><?= htmlspecialchars($filiere['filiere_name']) ?></h2>
                <select class="mt-2 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm">
                    <option value="">-- Select Group --</option>
                    <?php foreach ($filiere['groups'] as $group): ?>
                        <option value="<?= urlencode($group['group_name']) ?>">
                            <?= htmlspecialchars($group['group_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endforeach; ?>
    </div>
</div>