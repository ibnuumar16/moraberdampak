<?php

/**
 * Update Builder Tool
 * 
 * Script ini digunakan untuk mempaketkan source code project menjadi file update
 * yang siap di-upload ke update server.
 * 
 * Usage: php build_update.php
 */

// Konfigurasi
$projectRoot = __DIR__;
$distFolder = __DIR__ . '/update_server_dist';
$configFile = $distFolder . '/latest.json';

echo "==========================================\n";
echo "   Build Update Package Generator   \n";
echo "==========================================\n\n";

// 1. Input Versi
echo "Masukkan Versi Update Baru (contoh: 1.0.1): ";
$version = trim(fgets(STDIN));

if (empty($version)) {
    die("Error: Versi tidak boleh kosong.\n");
}

// 2. Input Deskripsi
echo "Masukkan Deskripsi Update: ";
$description = trim(fgets(STDIN));

// 3. Persiapkan Folder Output
$versionFolder = $distFolder . '/updates/' . $version;
if (!is_dir($versionFolder)) {
    mkdir($versionFolder, 0777, true);
}

echo "\n[1/4] Memproses Folder APP...\n";
$zipApp = new ZipArchive();
$zipAppPath = $versionFolder . '/app.zip';
if ($zipApp->open($zipAppPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($projectRoot . '/app', RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($projectRoot . '/app') + 1);
        
        // Filter folder/file yang tidak boleh di-update
        if (strpos($relativePath, 'Config') === 0) continue; // Jangan update config
        if (strpos($relativePath, 'Common.php') !== false) continue;
        
        $zipApp->addFile($filePath, $relativePath);
    }
    $zipApp->close();
    echo "Check: {$zipAppPath} (Created)\n";
}

echo "[2/4] Memproses Folder PUBLIC...\n";
$zipPublic = new ZipArchive();
$zipPublicPath = $versionFolder . '/public.zip';
if ($zipPublic->open($zipPublicPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($projectRoot . '/public', RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($projectRoot . '/public') + 1);
        
        // Filter
        if (strpos($relativePath, 'uploads') === 0) continue; // Jangan update folder uploads
        if (strpos($relativePath, 'index.php') !== false) continue;
        if (strpos($relativePath, '.htaccess') !== false) continue;

        $zipPublic->addFile($filePath, $relativePath);
    }
    $zipPublic->close();
    echo "Check: {$zipPublicPath} (Created)\n";
}

echo "[3/4] Memproses MIGRATIONS...\n";
$zipMig = new ZipArchive();
$zipMigPath = $versionFolder . '/migrations.zip';
if ($zipMig->open($zipMigPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($projectRoot . '/app/Database/Migrations', RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($projectRoot . '/app/Database/Migrations') + 1);
        $zipMig->addFile($filePath, $relativePath);
    }
    $zipMig->close();
    echo "Check: {$zipMigPath} (Created)\n";
}

echo "[4/4] Mengupdate latest.json...\n";
$latestData = [
    'version' => $version,
    'release_date' => date('Y-m-d H:i:s'),
    'description' => $description,
    'zip_url' => [
        'app' => "https://update.undanganaesthetic.my.id/updates/{$version}/app.zip",
        'public' => "https://update.undanganaesthetic.my.id/updates/{$version}/public.zip",
        'migrations' => "https://update.undanganaesthetic.my.id/updates/{$version}/migrations.zip"
    ]
];

file_put_contents($configFile, json_encode($latestData, JSON_PRETTY_PRINT));
echo "File latest.json updated.\n";

echo "\n------------------------------------------------\n";
echo "SUKSES! Paket update versi {$version} berhasil dibuat.\n";
echo "Lokasi: {$distFolder}\n";
echo "Silakan upload isi folder 'update_server_dist' ke hosting Anda.\n";
echo "------------------------------------------------\n";
