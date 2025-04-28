<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du stagiaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
    <?php include __DIR__ . '/../partials/layout.html'; ?>
    <div id="content" class="container mx-30 flex justify-center  min-h-screen">
        <div class="w-full max-w-6xl">
            <div class="container mx-auto p-6">
                <div class="bg-white shadow-md rounded p-6">
                    <h1 class="text-2xl font-bold mb-4">Détails du stagiaire</h1>
                    
                    <!-- Personal Information -->
                    <h2 class="text-xl font-semibold mb-2">Informations personnelles</h2>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div><strong>Nom :</strong> <?= htmlspecialchars($stagiaireDetails['first_name'].$stagiaireDetails['last_name']) ?></div>
                        <div><strong>ID :</strong> <?= htmlspecialchars($stagiaireDetails['stagiaire_id']) ?></div>
                        <div><strong>Email :</strong> <?= htmlspecialchars($stagiaireDetails['email']) ?></div>
                        <div><strong>Telephone :</strong> <?= htmlspecialchars($stagiaireDetails['phone']) ?></div>
                    </div>

                    <!-- Absence History -->
                    <h2 class="text-xl font-semibold mb-2">Historique de l'absence</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Date</th>
                                <th class="border border-gray-300 px-4 py-2">Module</th>
                                <th class="border border-gray-300 px-4 py-2">Seance</th>
                                <th class="border border-gray-300 px-4 py-2">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($absences as $absence): ?>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($absence['seance_date']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($absence['module_name']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($absence['seance_time']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($absence['status']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Justifier tout</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enregistrer les modifications</button>
                        <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
