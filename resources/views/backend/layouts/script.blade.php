 <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('public/backend/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('public/backend/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('public/backend/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('public/backend/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('public/backend/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/backend/dist/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('public/backend/dist/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('public/backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('public/backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/backend/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/dist/js/custom.min.js') }}"></script>

    <!-- xtra acc to page  -->
    <script src="{{ asset('public/backend/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <!-- DataTables  -->
    <script src="{{ asset('public/backend/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/dist/js/pages/datatable/custom-datatable.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/backend/dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>

     <!-- Quill JS -->
     <script src="{{ asset('public/backend/dist/libs/quill/dist/quill.min.js') }}"></script>

   <script>
      var loadFile = function(event) {
     var image = document.getElementById('output');
     image.src = URL.createObjectURL(event.target.files[0]);
      };
   </script>