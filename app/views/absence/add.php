<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Absences</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
    <?php include __DIR__ . '/../partials/layout.html'; ?>

    <div id="content" class="container mx-30 flex justify-center  min-h-screen">
        <div class="w-full max-w-6xl">
            <h1 class="text-2xl font-bold mb-6 text-center">Add Absences For : <?= $filiereName ?></h1>
            <form action="/ABS-ISTA/absence/create" method="POST" class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-semibold mb-4">Session Details</h2>
                <div class="mb-4">
                    <label for="seanceDate" class="block text-sm font-medium">Date:</label>
                    <input value="<?= date('Y-m-d') ?>" type="date" name="seanceDate" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="seanceTime" class="block text-sm font-medium">Time:</label>
                    <select id="seanceTime" name="seanceTime" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="1">Seance 1 : 8:00/10:00</option>
                        <option value="2">Seance 2 : 10:00/12:00</option>
                        <option value="3">Seance 3 : 14:00/16:00</option>
                        <option value="4">Seance 4 : 16:00/18:00</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ref" class="block text-sm font-medium">Module/Enseignant:</label>
                    <select id="module_id" name="module_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <?php foreach ($modules as $module): ?>
                            <option value="<?= $module['module_id'] ?>"><?= $module['module_name'] . " / " . $module['first_name']." ". $module['last_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <h2 class="text-xl font-semibold mb-4">Absences</h2>
                <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">First Name</th>
                            <th class="border border-gray-300 px-4 py-2">Last Name</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="absences">
                        <?php foreach ($stagiaires as $index => $stagiaire): ?>
                        <tr class="absence">
                            <td class="border border-gray-300 px-4 py-2">
                                <?= $stagiaire['first_name'] ?>
                                <input type="hidden" name="absences[<?= $index ?>][stagiaireId]" value="<?= $stagiaire['stagiaire_id'] ?>">
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <?= $stagiaire['last_name'] ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <input type="checkbox" name="absences[<?= $index ?>][status]" value="1" class="rounded"> Absence<!-- Checkbox for status -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
