<?php
// controllers/DashboardController.php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/DashboardModel.php';

class DashboardController {
    public function index(): void {
    
        $dm   = new DashboardModel();
        $stats       = $dm->getStats();
        [$labels, $dataset] = $dm->getWeekData();
        $topAbsents  = $dm->getTopAbsents();
        $recentAbsences = $dm->getRecentAbsences();
        $topPresents = $dm->getTopPresents();

        include __DIR__ . '/../views/home/dashboard.php';
    }
}
