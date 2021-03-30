
 <!-- /.content-wrapper-->
<br><br>
    
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!--Auto open tabs when load-->
  <script type="text/javascript">
      document.getElementById("openOnLoad").click();
  </script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <!-- Toggle between fixed and static navbar-->
  <script>
  $('#toggleNavPosition').click(function() {
    $('body').toggleClass('fixed-nav');
    $('nav').toggleClass('fixed-top static-top');
  });
  </script>
  
  <!-- Toggle between dark and light navbar-->
  <script>
  $('#toggleNavColor').click(function() {
    $('nav').toggleClass('navbar-dark navbar-light');
    $('nav').toggleClass('bg-dark bg-light');
    $('body').toggleClass('bg-dark bg-light');
  });
  </script>
</body>

</html>