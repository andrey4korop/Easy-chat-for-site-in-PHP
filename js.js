$(function(){
	var login = "";

	//Послать сообщение
	$('#btnSend').click(function(event){
		var name = $('#txtName').val();
		var msg = $('#txtMessage').val();
		
		$.ajax({
				type:"POST",
				url:"messageSave.php",
				data: ({name:name, msg:msg}),
				success:function(msg){
					if(msg==1){
						$('#txtMessage').val("");
					}
					$.ajax({
						url:"show.php",
						success:function(html){
							$('#messages').html(html);
						}
					});
				}
			});
	});

	//Добавление пользователя
	
	$('#btnLoginNew').click(function(event){
		authorize("loginSave.php");
	});
	
	//Авторизация пользователя
	$('#btnLogin').click(function(event){
		authorize("loginIn.php");
	});
	
	function authorize(who){
		var name = $('#txtName').val();
		var pass = $('#txtPass').val();
		
		if(name.length==0){
			alert("Имя не может быть пустым");
		}else if(name.length<2){
			alert("Слишком короткое имя")
		}else if(pass.length<6){
			alert("Пароль не может быть короче 6 символов")
		}else if(pass.length>10){
			alert("Пароль не может быть длиннее 10 символов")
		}else{
			$.ajax({
				type:"POST",
				url:who,
				data: ({name:name, pass:pass}),
				success:function(msg){
					if(msg==1){
						$('#win1').css("display","none");
						$('#autorize').append(""+name);
						$('#win2').css("display","block");
					}else if(msg==2){
						alert("Имя занято")
					}else if(msg==3){
						alert("Неверно введен логин или пароль")
					}
				}
			});
			//Обновление сообщений
			setInterval(showMess,100);
			setInterval(showActive,100);
			login = name;
			setInterval(delActive,100);
		}
	}
	
	function showMess(){
		$.ajax({
			type:"POST",
			url:"show.php",
			success:function(html){
				$('#messages').html(html);
			}
		});
	}
	
	function showActive(){
		$.ajax({
			type:"POST",
			url:"showActive.php",
			success:function(html){
				$('#active').html(html);
			}
		});
	}
	
	function delActive(){
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open('GET','delActive.php?name='+login,true);
		xmlhttp.send();
	}
}); 