 <!-- /.content-wrapper-->
    <footer>
      <div class="container">
        <center>Done By : Team48 of 16th Batch University of Colombo School of Computing</center>
          <center>
          <small>Copyright © <a href=""></a></small>
          </center>
      </div>
    </footer>
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
    <script>
    $(function(){

      // Remove svg.radial-progress .complete inline styling
      $('svg.radial-progress').each(function( index, value ) { 
          $(this).find($('circle.complete')).removeAttr( 'style' );
      });

      // Activate progress animation on scroll
      $(window).scroll(function(){
          $('svg.radial-progress').each(function( index, value ) { 
              // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
              if ( 
                  $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
                  $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
              ) {
                  // Get percentage of progress
                  percent = $(value).data('percentage');
                  // Get radius of the svg's circle.complete
                  radius = $(this).find($('circle.complete')).attr('r');
                  // Get circumference (2πr)
                  circumference = 2 * Math.PI * radius;
                  // Get stroke-dashoffset value based on the percentage of the circumference
                  strokeDashOffset = circumference - ((percent * circumference) / 100);
                  // Transition progress for 1.25 seconds
                  $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
              }
          });
      }).trigger('scroll');

      });
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
</body>

</html>
<?php ob_end_flush(); ?>