<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filiere Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <script>
        function navigateToGroupDetails(groupId) {
            window.location.href = '/ABS-ISTA/absence/groupDetails?groupId=' + groupId;
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
    <?php include __DIR__ . '/../partials/layout.html'; ?>
    <div id="content" class="container mx-auto p-6 flex justify-center items-center min-h-screen">
        <div class="ml-64 p-6" id="content">
            <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">Sélectionnez votre groupe</h1>
             <div class="flex flex-wrap gap-10">
                <?php $groups = ["groupe","groupe","groupe"] ; foreach ($filieres as $filiere): ?>
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 rounded-lg border border-gray-300 bg-white shadow p-4">
                    <!-- Filieres -->
                        <h2 class="text-2xl font-bold text-blue-700 mb-1">
                            <?= htmlspecialchars($filiere['filiere_name']) ?>
                        </h2>
                        <!-- Dropdown for groupes -->
                        <div>
                            <label for="groupes_<?= $filiere['filiere_id'] ?>" class="block text-sm font-medium text-700 mb-1">Groupes</label>
                            <select id="groupes_<?= $filiere['filiere_id'] ?>" onchange="navigateToGroupDetails(this.value)" class="block w-full rounded-md border-gray-300 shadow-sm                                                                                                                                   focus:ring-blue-500 focus:border-blue-500">
                                <option value=""> Sélectionner groupe </option>
                                <?php foreach ($groups as $groupe): ?>
                                    <option value="<?= htmlspecialchars($groupe) ?>"><?= htmlspecialchars($groupe) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    
</body>
</html>
