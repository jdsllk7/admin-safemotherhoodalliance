<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <p class="m-0 p-0">
        Copyright &copy;<script>
            document.write(new Date().getFullYear());
        </script> All rights reserved | Powered by
        <a href="https://joshuakosamu.netlify.app/" target="_blank">
            <img src="https://web-remote-resources.netlify.app/jdslk/jdslk_logo.png" height="40px" width="40px" alt="joshuakosamu.netlify.app">
        </a>
    </p>
</footer>


<div class="modal fade" id="modalDialogBox">
    <div class="modal-dialog modal-sm">
        <div class="modal-content bg-light">
            <div class="modal-header border-bottom-0 centerElementsInDiv">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="text-center modal-body-p"></p>
            </div>
            <div class="modal-footer center border-top-0 centerElementsInDiv">
                <button type="button" class="btn bg-gray hide" id="OkClose" style="width: 80px;">Okay</button>
                <button type="button" class="btn btn-danger hide" id="confirmCancel" style="width: 80px;">Cancel</button>
                <button type="button" class="btn btn-success hide" id="confirmOk" style="width: 80px;">Yes</button>
            </div>
        </div>
    </div>
</div>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script src="dist/js/dialogBox.js"></script>
<script src="dist/js/ajaxCallFormSubmit.js"></script>
<script src="dist/js/ajaxCallLoadHTML.js"></script>
<script src="dist/js/blog.js"></script>
<script src="dist/js/blogShare.js"></script>
<script src="dist/js/emailDelete.js"></script>
</body>

</html>