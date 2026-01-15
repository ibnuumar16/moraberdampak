<div class="main-panel">

  <div class="content-wrapper">
    
    <!-- Welcome Section -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center p-4">
                <div>
                    <h3 class="font-weight-bold mb-1">Assalamu'alaikum, <?= $user['nama_user']; ?>!</h3>
                    <p class="mb-0 opacity-75">Selamat datang di Dashboard <?= $pengaturan['nama']; ?>. Semoga hari Anda berkah.</p>
                </div>
                <i class="ti-user d-none d-md-block" style="font-size: 3rem; opacity: 0.5;"></i>
            </div>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Total Santri</p>
            <p class="fs-30 mb-2"><?= $jml_santri; ?></p>
            <p>Tahun <?= $pengaturan['tahun_akademik']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Total Guru</p>
            <p class="fs-30 mb-2"><?= $jml_guru; ?></p>
            <p>Pengajar Aktif</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Artikel & Berita</p>
            <p class="fs-30 mb-2"><?= $jml_artikel; ?></p>
            <p>Terpublikasi</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Pengguna Sistem</p>
            <p class="fs-30 mb-2"><?= $jml_user; ?></p>
            <p>Admin & Operator</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Chart Section -->
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
                <p class="card-title">Statistik Pendaftaran Santri</p>
            </div>
            <p class="font-weight-500">Grafik pendaftaran santri baru dalam 7 hari terakhir.</p>
            <div style="height: 300px;">
                <canvas id="registrationChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Registrations -->
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Pendaftar Terbaru</p>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="pl-0 pb-2 border-bottom">Nama Santri</th>
                            <th class="border-bottom pb-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($recent_santri)): ?>
                            <?php foreach($recent_santri as $s): ?>
                            <tr>
                                <td class="pl-0 py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-2 mr-2 text-primary font-weight-bold">
                                            <?= substr($s['nama_santri'], 0, 1); ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 font-weight-bold"><?= esc($s['nama_santri']); ?></h6>
                                            <small class="text-muted"><?= esc($s['kabupaten_santri']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-muted font-weight-500">
                                    <?= date('d M', strtotime($s['tanggal_masuk'] ?? date('Y-m-d'))); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <a href="<?= base_url('dashboard/santri'); ?>" class="btn btn-outline-primary btn-block btn-sm">Lihat Semua Data</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('registrationChart').getContext('2d');
            var registrationChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= $chart_labels; ?>,
                    datasets: [{
                        label: 'Pendaftaran Baru',
                        data: <?= $chart_data; ?>,
                        borderColor: '#11605d',
                        backgroundColor: 'rgba(17, 96, 93, 0.2)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#11605d',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                borderDash: [2, 4],
                                color: '#f0f0f0'
                            },
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
    });
  </script>