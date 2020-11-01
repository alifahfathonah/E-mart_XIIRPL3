      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Toko Online - XII RPL 1 | <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url() ?>assets/js/sb-admin-2.min.js"></script>

<script>
$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
    // breakpoint and up  
    $(window).resize(function(){
        if ($(window).width() >= 980){  

          // when you hover a toggle show its dropdown menu
          $(".navbar .dropdown-toggle").hover(function () {
             $(this).parent().toggleClass("show");
             $(this).parent().find(".dropdown").toggleClass("show");
             $(this).parent().find(".dropdown-menu").toggleClass("show");
           });

            // hide the menu when the mouse leaves the dropdown
          $( ".navbar .dropdown-menu" ).mouseleave(function() {
            $(this).removeClass("show");  
          });
      
            // do something here
        }   
    });

  
  

// document ready  
});    
</script>
</body>

</html>