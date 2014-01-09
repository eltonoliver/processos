<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
	<title> Cadastro de Processos Senac-AM </title>
	<?php 
		foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	
	<style type="text/css"> body{ font-family: Arial; } </style>
</head>
<body>




<?php 

echo $contents;

?>

</body>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<script type="text/javascript">

	$(function(){
		<?php $server = $_SERVER['SERVER_NAME']; ?>
		$("#field-numeroEdital").focus(function(){
			
			$.ajax({
			   type: "POST",
			   url: "http://<?=$server;?>/processos/home/getLastId/",
			   data: "",
			   success: function(data){
			      if(data === "" || data === null){

			      	console.log("Vazio");
			      }else{

			      	console.log(data);
			      }
			   }
			 });

		})

	});
</script>
</html>