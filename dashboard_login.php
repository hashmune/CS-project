<?php
require 'components/header.php';
?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script> 
<script>
	$(document).ready(function(){
		$("#btn").click(function(){
			var username=$("#username").val();
			var password=$("#password").val();
			if(username == ''){
				$("#username").css('outline','1px solid red');
			}else{
				
				$("#loginfo").html("<center><img src='public/img/ajax-loader.gif' /></center>");
				
				$.ajax({
					type:"post",
					url:"login_process.php",
					data:"username="+username+"&password="+password,
					success:function(data){
						if(data == "hamburger"){
							window.location.replace('dashboard/dashboard.php');  
						}else{
							$("#loginfo").html(data);	
						}
					}
				});
			}
			
		});
		
		$("#password").keyup(function(e){
			var code = e.which;
			if(code==13)e.preventDefault();
			if(code==32||code==13||code==188||code==186){
				
				var username=$("#username").val();
				var password=$("#password").val();
				if(username == ''){
					$("#username").css('outline','1px solid red');
				}else{
					
					$("#loginfo").html("<center><img src='public/img/ajax-loader.gif'/></center>");
					
					$.ajax({
						type:"post",
						url:"login_process.php",
						data:"username="+username+"&password="+password,
						success:function(data){
							if(data == "hamburger"){
								window.location.replace('dashboard/dashboard.php');  
							}else{
								$("#loginfo").html(data);	
							}
						}
					});
				}
				
			}
		});
	});
</script>
</head>
<body>

	<?php
	require 'components/nav.php';
	?>

	<div class="login-page">
		<div class="container">
			<div class="form">
				<form method="post" class="login-form">
					<input autocomplete="off" type="text" id="username"  name="username" placeholder="username"  maxlength="15" size="15"/>
					<input autocomplete="off" type="password" id="password"  name="password" placeholder="password"  maxlength="10"/>
					<input class="btn" id="btn" type="button" name="submit" value="login" />
					<!--<button id="btn" name="submit">login</button>-->
					<br>
					<div id="loginfo" style="color:#f74242; font-weight: bold;"> </div> 
				</form>
			</div>
		</div>
	</div>
</body>
</html>
