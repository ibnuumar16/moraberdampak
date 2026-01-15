
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">System Update</h4>
                        <p class="font-weight-medium mb-0 text-muted">Kelola pembaruan sistem aplikasi pesantren Anda</p>
                    </div>
                     <div class="text-right">
                        <span class="badge badge-pill badge-primary p-2 px-3 shadow-sm">
                            <i class="ti-layers-alt mr-1"></i> Current Version v<?= $currentVersion ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 d-flex grid-margin stretch-card">
                <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center pt-5 pb-5">
                        <div class="mb-4 position-relative">
                            <div id="status-icon-wrapper" class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 120px; height: 120px; background: rgba(75, 73, 172, 0.1); transition: all 0.3s ease;">
                                <i id="status-icon" class="ti-cloud-down text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <div id="pulse-ring" class="position-absolute" style="top:0; left:0; width:100%; height:100%; border-radius:50%; border: 2px solid var(--primary); opacity:0; animation: none;"></div>
                        </div>
                        
                        <h3 class="font-weight-bold mb-2" id="status-title">Memeriksa...</h3>
                        <p class="text-muted mb-4 px-3" id="status-desc">Menghubungkan ke server update...</p>

                        <div id="action-container" class="w-100 px-4 mt-auto">
                            <button id="btn-check" class="btn btn-primary btn-block btn-lg shadow-sm font-weight-bold" style="border-radius: 10px;">
                                <i class="ti-reload mr-2"></i> Cek Pembaruan
                            </button>
                            
                            <button id="btn-update" class="btn btn-gradient-success btn-block btn-lg shadow-sm font-weight-bold d-none" style="border-radius: 10px;">
                                <i class="ti-download mr-2"></i> Update Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="card-title text-primary"><i class="ti-info-alt mr-2"></i> Informasi Update</h4>
                        
                        <!-- State: Empty/Checking -->
                        <div id="info-placeholder" class="text-center py-5">
                            <img src="<?= base_url('aset_dashboard_2/images/dashboard/people.png') ?>" alt="Waiting" class="img-fluid mb-3" style="opacity: 0.5; max-height: 150px; filter: grayscale(100%);">
                            <h5 class="text-muted">Menunggu hasil pengecekan...</h5>
                        </div>

                        <!-- State: Update Available -->
                        <div id="update-details" class="d-none animate__animated animate__fadeIn">
                            <div class="alert alert-success d-flex align-items-center border-0 shadow-sm" role="alert" style="background: rgba(25, 135, 84, 0.1); color: #155724;">
                                <i class="ti-check-box mr-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <strong>Versi Baru Tersedia!</strong>
                                    <div class="small">Versi <span id="new-version-badge" class="badge badge-success ml-1">...</span> siap diunduh.</div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="font-weight-bold mb-3 border-bottom pb-2">Apa yang baru?</h5>
                                <div id="changelog-content" class="bg-light p-3 rounded" style="max-height: 250px; overflow-y: auto; font-family: 'Consolas', monospace; font-size: 0.9rem; color: #555;">
                                    <!-- Changelog injected here -->
                                </div>
                            </div>
                        </div>

                        <!-- State: Up to Date -->
                        <div id="uptodate-details" class="d-none animate__animated animate__fadeIn text-center py-5">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="ti-shield text-success" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="text-success font-weight-bold">Sistem Aman!</h3>
                            <p class="text-muted">Anda sudah menggunakan versi terbaru.</p>
                        </div>

                        <!-- Progress Section -->
                        <div id="progress-container" class="d-none mt-4">
                            <h5 class="text-center mb-3 font-weight-bold text-primary" id="progress-status">Sedang Memproses...</h5>
                            <div class="progress" style="height: 25px; border-radius: 15px; box-shadow: inset 0 1px 3px rgba(0,0,0,.1);">
                                <div id="update-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-gradient-primary" role="progressbar" style="width: 0%">
                                    <span class="font-weight-bold pl-2" id="progress-percent">0%</span>
                                </div>
                            </div>
                            <div class="mt-3 row text-center">
                                <div class="col-3">
                                    <small class="text-success font-weight-bold"><i class="ti-save"></i> Backup</small>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted" id="step-download"><i class="ti-cloud-down"></i> Download</small>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted" id="step-extract"><i class="ti-package"></i> Install</small>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted" id="step-migrate"><i class="ti-server"></i> Database</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- History / Rollback Section -->
        <div class="row mt-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm border-0" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="card-title text-primary"><i class="ti-time mr-2"></i> Riwayat Backup & Rollback</h4>
                        <p class="card-description">Daftar backup otomatis yang dibuat sebelum update. Anda dapat mengembalikan sistem ke versi sebelumnya jika terjadi masalah.</p>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Backup</th>
                                        <th>Nama File</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($backups)): ?>
                                        <?php foreach ($backups as $backup): ?>
                                            <tr>
                                                <td><?= $backup['date'] ?></td>
                                                <td><code><?= $backup['filename'] ?></code></td>
                                                <td><?= $backup['size'] ?></td>
                                                <td>
                                                    <button class="btn btn-outline-danger btn-sm btn-rollback" data-filename="<?= $backup['filename'] ?>">
                                                        <i class="ti-control-backward mr-1"></i> Restore
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada data backup.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .btn-gradient-success {
        background: linear-gradient(45deg, #1bcfb4, #198ae3);
        border: none;
        color: white;
    }
    .btn-gradient-success:hover {
        background: linear-gradient(45deg, #198ae3, #1bcfb4);
        color: white;
        box-shadow: 0 5px 15px rgba(25, 138, 227, 0.4);
    }
    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
    }
    @keyframes pulse-custom {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(75, 73, 172, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 20px rgba(75, 73, 172, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(75, 73, 172, 0); }
    }
    .pulsing {
        animation: pulse-custom 2s infinite;
    }
    /* Scrollbar minimalis for changelog */
    #changelog-content::-webkit-scrollbar {
        width: 6px;
    }
    #changelog-content::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    #changelog-content::-webkit-scrollbar-thumb {
        background: #ccc; 
        border-radius: 3px;
    }
    #changelog-content::-webkit-scrollbar-thumb:hover {
        background: #aaa; 
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnCheck = document.getElementById('btn-check');
    const btnUpdate = document.getElementById('btn-update');
    const statusTitle = document.getElementById('status-title');
    const statusDesc = document.getElementById('status-desc');
    const statusIcon = document.getElementById('status-icon');
    const statusIconWrapper = document.getElementById('status-icon-wrapper');
    
    const infoPlaceholder = document.getElementById('info-placeholder');
    const updateDetails = document.getElementById('update-details');
    const uptodateDetails = document.getElementById('uptodate-details');
    const changelogContent = document.getElementById('changelog-content');
    const newVersionBadge = document.getElementById('new-version-badge');
    
    const progressContainer = document.getElementById('progress-container');
    const progressBar = document.getElementById('update-progress-bar');
    const progressPercent = document.getElementById('progress-percent');
    
    // Status visual helpers
    function setVisualState(state) {
        statusIconWrapper.classList.remove('pulsing');
        statusIcon.className = ''; 
        statusIconWrapper.style.background = ''; // reset

        // Hide all right panels first
        infoPlaceholder.classList.add('d-none');
        updateDetails.classList.add('d-none');
        uptodateDetails.classList.add('d-none');
        progressContainer.classList.add('d-none');

        if(state === 'checking') {
            statusIcon.className = 'ti-reload fa-spin text-primary';
            statusIcon.style.fontSize = '3rem';
            statusIconWrapper.style.background = 'rgba(75, 73, 172, 0.1)';
            statusTitle.innerText = 'Memeriksa...';
            statusDesc.innerText = 'Menghubungkan ke server update...';
            infoPlaceholder.classList.remove('d-none');
        } else if(state === 'available') {
            statusIcon.className = 'ti-download text-success';
            statusIconWrapper.classList.add('pulsing');
            statusIconWrapper.style.background = 'rgba(25, 135, 84, 0.1)';
            statusTitle.innerText = 'Update Tersedia!';
            statusDesc.innerText = 'Versi baru siap diinstall.';
            updateDetails.classList.remove('d-none');
            
            btnCheck.classList.add('d-none');
            btnUpdate.classList.remove('d-none');
        } else if(state === 'uptodate') {
            statusIcon.className = 'ti-check text-white';
            statusIconWrapper.style.background = '#1bcfb4'; // Teal
            statusTitle.innerText = 'Sistem Up-to-Date';
            statusDesc.innerText = 'Tidak ada pembaruan tersedia.';
            uptodateDetails.classList.remove('d-none');
            
            btnCheck.classList.remove('d-none');
            btnUpdate.classList.add('d-none');
        } else if(state === 'error') {
            statusIcon.className = 'ti-close text-danger';
            statusIconWrapper.style.background = 'rgba(220, 53, 69, 0.1)';
            statusTitle.innerText = 'Gagal Terhubung';
            statusDesc.innerText = 'Cek koneksi internet Anda.';
            infoPlaceholder.classList.remove('d-none');
            btnCheck.classList.remove('d-none');
        } else if(state === 'updating') {
            statusIcon.className = 'ti-settings fa-spin text-warning';
            statusIconWrapper.style.background = 'rgba(255, 193, 7, 0.1)';
            statusTitle.innerText = 'Updating...';
            statusDesc.innerText = 'Jangan tutup halaman ini.';
            progressContainer.classList.remove('d-none');
            
            btnCheck.classList.add('d-none');
            btnUpdate.classList.add('d-none');
        }
    }

    checkUpdate(); // Auto run

    btnCheck.addEventListener('click', checkUpdate);
    
    btnUpdate.addEventListener('click', function() {
        if(confirm('PENTING: Sistem akan otomatis dibackup sebelum update. Lanjutkan?')) {
            runUpdate();
        }
    });

    // Rollback Handlers
    document.querySelectorAll('.btn-rollback').forEach(btn => {
        btn.addEventListener('click', function() {
            const filename = this.dataset.filename;
            Swal.fire({
                title: 'Konfirmasi Restore',
                text: "Apakah Anda yakin ingin mengembalikan sistem ke versi backup ini? (" + filename + ")",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Restore!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    runRollback(filename);
                }
            })
        });
    });

    function runRollback(filename) {
        Swal.fire({
            title: 'Sedang Memulihkan...',
            html: 'Mohon tunggu, jangan tutup halaman ini.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        const formData = new FormData();
        formData.append('filename', filename);

        fetch('<?= base_url('update-system/rollback') ?>', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.json())
        .then(data => {
            if(data.status) {
                Swal.fire(
                    'Berhasil!',
                    'Sistem telah dikembalikan ke versi backup.',
                    'success'
                ).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire('Gagal!', data.message, 'error');
            }
        })
        .catch(err => {
            Swal.fire('Error!', err.message, 'error');
        });
    }

    function checkUpdate() {
        setVisualState('checking');
        
        // Simulate network delay for UX (min 800ms)
        const minTime = new Promise(resolve => setTimeout(resolve, 800));
        const fetchReq = fetch('<?= base_url('update-system/check') ?>', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        }).then(r => r.json());

        Promise.all([fetchReq, minTime]).then(([data]) => {
            if(data.status) {
                if (data.has_update) {
                    setVisualState('available');
                    newVersionBadge.innerText = data.remote_version;
                    btnUpdate.dataset.version = data.remote_version;
                    changelogContent.innerHTML = data.details.description ? data.details.description.replace(/\n/g, "<br>") : 'Tidak ada detail.';
                } else {
                    setVisualState('uptodate');
                }
            } else {
                throw new Error(data.message || 'Respon server tidak valid');
            }
        }).catch(err => {
            console.error(err);
            setVisualState('error');
            // Show exact error in description for debugging
            document.getElementById('status-desc').innerText = err.message;
        });
    }

    function runUpdate() {
        setVisualState('updating');
        const version = btnUpdate.dataset.version;
        
        simulateProgressSteps();
        
        const formData = new FormData();
        formData.append('version', version);

        fetch('<?= base_url('update-system/run') ?>', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.json())
        .then(data => {
            if(data.status) {
                finishProgress().then(() => {
                     Swal.fire('Sukses!', 'Sistem berhasil diperbarui.', 'success').then(() => {
                         window.location.reload();
                     });
                });
            } else {
                throw new Error(data.message);
            }
        })
        .catch(err => {
            Swal.fire('Gagal!', err.message, 'error');
            setVisualState('available'); // Reset to available
        });
    }
    
    // Fake progress animation that stops at 90% until done
    let progressInterval;
    function simulateProgressSteps() {
        let width = 0;
        progressBar.style.width = '0%';
        progressPercent.innerText = '0%';
        
        // Indicators
        const stepDownload = document.getElementById('step-download');
        const stepExtract = document.getElementById('step-extract');
        const stepMigrate = document.getElementById('step-migrate');
        
        stepDownload.className = 'text-muted'; 
        stepExtract.className = 'text-muted';
        stepMigrate.className = 'text-muted';

        progressInterval = setInterval(() => {
            if(width < 90) {
                width += Math.random() * 2; // Random increment
                if(width > 90) width = 90;
                
                progressBar.style.width = width + '%';
                progressPercent.innerText = Math.round(width) + '%';
                
                // Colorize steps
                if(width > 20) stepDownload.className = 'text-success font-weight-bold';
                if(width > 50) stepExtract.className = 'text-success font-weight-bold';
                if(width > 80) stepMigrate.className = 'text-success font-weight-bold';
            }
        }, 500); 
    }

    function finishProgress() {
        return new Promise(resolve => {
            clearInterval(progressInterval);
            progressBar.style.width = '100%';
            progressPercent.innerText = '100%';
            progressBar.classList.remove('progress-bar-animated');
            progressBar.classList.add('bg-success');
            setTimeout(resolve, 500);
        });
    }
});
</script>
<!-- SweetAlert2 (Assuming user might verify file changes, but injecting via CDN if not present in dashboard is safer, or use standard alert) -->
<!-- Using standard alert in JS fallback, but Swal is nicer. Let's assume user has it or I can link it. Dashboard usually has it. -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
