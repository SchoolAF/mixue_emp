	<div class="row">
        <div class="col-md-12">
			<div class="alert alert-info" role="alert">
  				<i class="fas fa-edit"></i> Add New Employee
			</div>

			<div class="card">
			  	<div class="card-body">
			    	<form class="needs-validation" action="emp_save.php" method="post" enctype="multipart/form-data" novalidate>
					  	<div class="row">
					    	<div class="col">
					      		<div class="form-group col-md-12">
									<label>NIP</label>
									<input type="text" class="form-control" name="nip" maxlength="18" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>

								<div class="form-group col-md-12">
									<label>Birth place</label>
									<input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>

								<div class="form-group col-md-12">
									<label class="mb-3">Gender</label>
									<div class="custom-control custom-radio">
									    <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-laki" required>
									    <label class="custom-control-label" for="customControlValidation2">Male</label>
									</div>
									<div class="custom-control custom-radio mb-4">
									    <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" required>
									    <label class="custom-control-label" for="customControlValidation3">Female</label>
									    <div class="invalid-feedback">Select Gender.</div>
									</div>
								</div>
								
					      		<div class="form-group col-md-12">
									<label>Religion</label>
									<select class="form-control" name="agama" autocomplete="off" required>
								      	<option value=""></option>
										<option value="Islam">Islam</option>
										<option value="Kristen Protestan">Kristen Protestan</option>
										<option value="Kristen Katolik">Kristen Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Buddha">Buddha</option>
								    </select>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>
					    	</div>

					    	<div class="col">
								<div class="form-group col-md-12">
									<label>Name</label>
									<input type="text" class="form-control" name="nama_pegawai" autocomplete="off" required>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>

								<div class="form-group col-md-12">
									<label>Birth date</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" required>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>

								<div class="form-group col-md-12">
									<label>Address</label>
									<textarea class="form-control" rows="2" name="alamat" autocomplete="off" required></textarea>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>

								<div class="form-group col-md-12">
									<label>Phone</label>
									<input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">You can't leave this field blank!</div>
								</div>
					    	</div>

					    	<div class="col">
					    		<div class="form-group col-md-12">
									<label>Picture of employee</label>
    								<input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
									<div id="imagePreview"><img class="foto-preview" src="assets/img/mixue.png"/></div>
								</div>
					    	</div>
					  	</div>

					  	<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-5">
			                <input type="submit" class="btn btn-info btn-submit" name="Save" value="Simpan">
				  		</div>
					</form>
			  	</div>
			</div>
        </div>
	</div>
