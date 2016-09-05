$(document).ready(function() {

	jQuery(".form-delete").submit(function(e) {
		var self = this;
		e.preventDefault();
		swal({   title: "Apakah Anda Yakin?",   
			text: "File yang sudah dihapus tidak dapat dikembaikan!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Ya, hapus!",   
			cancelButtonText: "Batal",
			closeOnConfirm: false }, 
			function(){  				
				self.submit();
			}
			);
     return false; //is superfluous, but I put it here as a fallback
 });


	/* DataTable for Ternak Table */
	
	$('#table-ternak').DataTable({
		"scrollX": true,
		"columnDefs": [ {
			"targets": 7,
			"orderable": false
		} ,{
			"targets": 8,
			"orderable": false
		}
		]
	}
	);


	/* DataTable for TS table */
	
	$('#table-ts').DataTable({
		"scrollX": true,
		"columnDefs": [ {
			"targets": 3,
			"orderable": false
		} ,{
			"targets": 4,
			"orderable": false
		}
		]
	}
	);


	/* DataTable for Sapronak Table */
	
	$('#table-sapronak').DataTable({
		"columnDefs": [ {
			"targets": 2,
			"orderable": false
		} ]
	}
	);

	/**
	 *
	 * Tambah data kedalam list Sapronak
	 *
	 */

	 var i=1;

	 $(document).on('click','#plus-sapronak', function(){
	 	row = '<tr>'+
	 	'<td>'+
	 	'<div class="input-group margin-bottom-sm col-sm-12">'+
	 	'<span class="input-group-addon"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i></span>'+
	 	'<input type="text" class="form-control input-sm" name="namaBarang['+i+']">'+
	 	'</div>'+
	 	'</td>'+
	 	'<td>'+
	 	'<div class="input-group margin-bottom-sm col-sm-12">'+
	 	'<span class="input-group-addon"><i class="fa fa-chevron-circle-down fa-fw" aria-hidden="true"></i></span>'+
	 	'<select name="jenis['+i+']" class="form-control input-sm">'+
	 	'<option value="DOC">DOC</option>'+
	 	'<option value="Pakan">Pakan</option>'+
	 	'<option value="Obat">Obat</option>'+
	 	'</select>'+
	 	'</div>'+
	 	'</td>'+
	 	'<td>'+
	 	'<div class="input-group margin-bottom-sm col-sm-12">'+
	 	'<span class="input-group-addon"><i class="fa fa-calculator fa-fw" aria-hidden="true"></i></span>'+
	 	'<input type="text" name="jumlah['+i+']" class="form-control input-sm">'+
	 	'</div>'+
	 	'</td>'+
	 	'<td>'+
	 	'<div class="input-group margin-bottom-sm col-sm-12">'+
	 	'<span class="input-group-addon"><i class="fa fa-money fa-fw" aria-hidden="true"></i></span>'+
	 	'<input type="text" name="harga['+i+']" class="form-control input-sm">'+
	 	'</div>'+
	 	'</td>'+
	 	'<td><button class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></button></td></tr>';
	 	$(row).insertBefore('#last');
	 	i++;
	 });

	 $(document).on('click','.del', function(){
	 	$(this).parent().parent().remove();
	 });

	});