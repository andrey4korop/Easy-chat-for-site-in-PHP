<html>
<head>
<title>Корпоративный чат</title>
<script src="jquery.js" type="text/javascript"></script>
<script src="js.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id='window'>
<h2 align='center'>Корпоративный чат компании</h2>
<div id="win1">
	<b>Введите имя:&nbsp;</b><input id="txtName" type="text"/>&nbsp;
	<br>
	<b>Введите пароль:&nbsp;<b><input id="txtPass" type="text"/><br>
	<button id="btnLogin">Авторизоваться</button> Или <button id="btnLoginNew">Зарегистрироваться</button>
</div>
<div id="win2">
	<span id="autorize">Вы авторизовались как: </span><div id="active"></div><br>
	<span>Введите сообщение:</span><br>
	<textarea id="txtMessage"></textarea>
	<br>
	<button id="btnSend">Отправить</button>
	<hr>
	<div id="messages"></div>
</div>
</div>
</body>
</html>
