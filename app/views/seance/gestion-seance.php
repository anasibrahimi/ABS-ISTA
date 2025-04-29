<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seances</title>
   
</head>
<body>
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
<div class="container-fluid p-0">
    <div class="row g-0">
        
    <?php include __DIR__ . '/../partials/layout.html'; ?>
        <div class="col-12" id="content">
            <nav class="navbar navbar-expand navbar-light bg-white py-1" style="border-bottom: 1px solid black;margin: 10px;">
                <div class="container-fluid">
                    <span id="path" class="navbar-brand mb-0 h1"><i class="bi bi-cpu"></i> System</span>
                    <div class="ms-auto">
                        <span class="text-muted" id="User"></span>
                    </div>
                </div>
            </nav>
            <main class="main-content p-2">
                <h2 class="mb-4" style="color: blue"><i class="bi bi-calendar-check"></i> Gestion des Séances</h2>

                <!-- Barre de filtrage -->
                <form class="row g-3 align-items-end mb-4">
                    <div class="col-md-2">
                        <label for="filterSecteur" class="form-label">Secteur</label>
                        <select class="form-select" id="filterSecteur">
                            <option value="GI">GI</option>
                            <option value="GE">GE</option>
                            <option value="ER">ER</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="filterClasse" class="form-label">Classe</label>
                        <select class="form-select" id="filterClasse">
                            <option value="GI101">GI101</option>
                            <option value="GI102">GI102</option>
                            <option value="GE201">GE201</option>
                            <option value="ER301">ER301</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="filterSeance" class="form-label">Séance</label>
                        <select class="form-select" id="filterSeance">
                            <option value="S1">S1: 8:00/10:30</option>
                            <option value="S2">S2: 11:00/12:30</option>
                            <option value="S3">S3: 14:00/15:30</option>
                            <option value="S4">S4: 16:00/17:30</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="filterDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="filterDate">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                    </div>
                </form>

                <!-- Barre de recherche -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text" id="search-addon"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Recherche" aria-describedby="search-addon">
                    </div>
                </div>

                <div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Acteur</th>
                            <th>Seance</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($seances as $seance): ?>
                            <tr>
                                <td><?= htmlspecialchars($seance['seance_id']) ?></td>
                                <td><?= htmlspecialchars($seance['enseignant_first_name'])." ".htmlspecialchars($seance['enseignant_last_name']) ?></td>
                                <td><?= htmlspecialchars($seance['seance_time']) ?></td>
                                <td><?= htmlspecialchars($seance['seance_date']) ?></td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="/ABS-ISTA/seance/delete?seance_id=<?= urlencode($seance['seance_id']) ?>" 
                                           class="btn btn-danger" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette séance ?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="/ABS-ISTA/seance/details?seance_id=<?= urlencode($seance['seance_id']) ?>" 
                                           class="btn btn-primary text-white">
                                            <i class="bi bi-plus"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</div>

</body>
</html>
