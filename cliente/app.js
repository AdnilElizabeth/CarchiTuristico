$(function(){
	$('#btn_alojamiento').click(function(){
		$('#modal-alojamiento').modal('show');		
		$.ajax({
			url: 'app.php',
			type: 'POST',
			data: {alojamientos: '',id_canton:$('#txt_id_cantones').val()},
			success:function(data){
				console.log(data);
				$('#obj_alojamiento').html(data)
			}
		});
		
	});
	$('#btn_modal_tulcan').click(function(){
		$('#txt_id_cantones').val('20150413153432552c2858816e7');
	});
	$('#btn_modal_montufar').click(function(){
		$('#txt_id_cantones').val('20150413153422552c284e7e5cb');
	});
	
});