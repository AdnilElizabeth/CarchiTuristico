<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<label>Numero</label>
<input	type="text" class="txt_1" id="txt_numero">
<button id="btn_ejecutar">Ejecutar</button>
<div id="obj_1">hola</div>
<style type="text/css">
	.txt_1{
		background: red;
	}
</style>
<script type="text/javascript">
	$(function(){
		$('#btn_ejecutar').click(function(){
			$.ajax({
				url:'index2.php',
				type:'POST',
				data:{a:'4',b:'6'},
				success:function(data){
					console.log(data)
					$('#txt_numero').val(data)
					$('#obj_1').html(data)
				}
			})
		});
		
	})
</script>