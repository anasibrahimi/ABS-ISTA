<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filiere Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
    <?php include __DIR__ . '/../partials/layout.html'; ?>
    <div id="content" class="container mx-auto p-6 flex justify-center items-center min-h-screen">

        <div class="ml-64 p-6" id="content">
            <h1 class="text-2xl font-bold mb-6 text-center">Select a Filiere</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4" >
                <?php foreach ($filieres as $filiere): ?>
                    <a href="/ABS-ISTA/absence/stagiaireView?filiereName=<?= urlencode($filiere['filiere_name']) ?>" 
                       class="block bg-blue-500 text-white text-center py-4 rounded shadow hover:bg-blue-600 no-underline">
                        <?= htmlspecialchars($filiere['filiere_name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
</body>
</html>
