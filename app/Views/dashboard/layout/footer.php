<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
      Copyright © 2025 <a href="#" target="_blank">Pondok Pesantren Al-Falahiyah Mlangi - Yogyakarta</a>. Semua hak cipta dilindungi x moragister.
    </span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
      made with <i class="ti-heart text-danger ms-1"></i>
    </span>
  </div>
</footer>
</div>

<!-- Plugin JS lainnya -->
<script src="<?= base_url()?>/aset_dashboard_2/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url()?>/aset_dashboard_2/js/off-canvas.js"></script>
<script src="<?= base_url()?>/aset_dashboard_2/js/template.js"></script>
<script src="<?= base_url()?>/aset_dashboard_2/js/settings.js"></script>
<script src="<?= base_url()?>/aset_dashboard_2/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?= base_url()?>/aset_dashboard_2/js/dashboard.js"></script>

<script>
  // Global Delete Confirmation using Event Delegation
  document.addEventListener('click', function(e) {
      // Check if the clicked element or its parent has data-confirm attribute
      var target = e.target;
      var confirmElement = target.closest('[data-confirm]');

      if (confirmElement) {
          var message = confirmElement.getAttribute('data-confirm') || 'Apakah Anda yakin ingin menghapus data ini?';
          if (!confirm(message)) {
              e.preventDefault();
              return false;
          }
          // If confirmed, let the event proceed (link navigation)
      }
  });
</script>

</body>
</html>
