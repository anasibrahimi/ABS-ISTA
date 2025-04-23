<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiaire Absences</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/layout.html'; ?>


    <div id="content" class="container mx-30 flex justify-center  min-h-screen">
    <div class="w-full max-w-6xl">

        <h1 class="text-2xl font-bold mb-6 text-center"><?= htmlspecialchars($filiereName) ?></h1>
        
        <!-- Mark Absences Form -->
        <form action="/ABS-ISTA/absence/addView" method="get">
            <input type="hidden" name="filiereName" value="<?= htmlspecialchars($filiereName) ?>">
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mark Absences
                </button>
            </div>
        </form>

        <form action="-" method="get">
            <!-- Table -->
            <div class="bg-white shadow-md rounded overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2  text-gray-600">First Name</th>
                            <th class="px-4 py-2  text-gray-600">Last Name</th>
                            <th class="px-4 py-2  text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($stagiaires)): ?>
                            <?php foreach ($stagiaires as $stagiaire): ?>
                                <tr class="border-b">
                                    <td class="px-4 py-2"><?= htmlspecialchars($stagiaire['first_name']) ?></td>
                                    <td class="px-4 py-2"><?= htmlspecialchars($stagiaire['last_name']) ?></td>
                                    <td class="px-4 py-2">
                                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                            More
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-center text-gray-500">No stagiaires found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>
