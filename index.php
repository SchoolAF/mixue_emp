<?php  
require_once "config/config.php";
?>

<!doctype html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
	    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script type="text/javascript" src="assets/js/fungsi_validasi_karakter.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>

	    <title>Mixue Employee Data Panel</title>
  	</head>
  	<body>
      <div class="container-md">
            <div class="container-fluid">
                <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                    <h5 class="my-0 mr-md-auto font-weight-normal text-dark"><img class="mixue-nav" src="assets/img/mixue.png"> MIXUE Employee Data</h5>
                <?php  

                if (empty($_GET["page"])) { ?>
                    <a class="btn btn-outline-primary" href="?page=tambah" role="button">Add Employee</a> &nbsp; &nbsp;
                <?php
                } 

                else { ?>
                    <a class="btn btn-outline-secondary" href="index.php" role="button">Back</a>
                <?php
                } 
                ?>
                    
                </div>
            </div>

            <div class="container-fluid">
            <?php

            if (empty($_GET["page"])) {
                include "emp_data_table.php";
            } 

            elseif ($_GET['page']=='tambah') {
                include "add_emp.php";
            } 

            elseif ($_GET['page']=='ubah') {
                include "edit_emp.php";
            } 
            ?>
            </div>
            
            <div class="container-fluid">
                <footer class="pt-4 my-md-4 pt-md-3 border-top">
                    <div class="row">
                        <div class="col-12 col-md center">
                            &copy; Mixue Invasion Co.Ltd</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/popper.min.js"></script>
	    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
	    <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        } );

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function validasiFile() {
            var fileInput         = document.getElementById('foto');
            var filePath          = fileInput.value;
            var fileSize          = $('#foto')[0].files[0].size;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default_user.png"/>';
                return false;
            } 
            else if (fileSize >= 1000000) {
                alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default_user.png"/>';
                return false;
            }
            else {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="'+e.target.result+'"/>';
                };
            reader.readAsDataURL(fileInput.files[0]);
            }
        }}
        </script>
  	</body>
</html>