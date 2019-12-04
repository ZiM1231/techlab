<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password2'))";
			mysqli_query($dbc,$query);
			echo 'Все готово, можете авторизоватися';
			mysqli_close($dbc);
			exit();
		}
		else {
			echo 'Логін уже існує';
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TechLab</title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700|Roboto:400,100,300,500,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/techlab.css">
 <style>
   hr {
    border: none; 
    background-color: grey; 
    color: red; 
    height: 2px; 
   }
  </style>
</head>

<body>

	  
	<header>
	<h1>Tech Lab</h1>
	<img src="images/lab4.png" alt="Центрируем изображение" class="center-img" />
		<ul>
  			<li><a href="/">Головна</a></li>
   			<li><a href="/">Новини</a></li>
   			<li><a href="/">Галарея</a></li>
   			<li><a href="/">Зворотній зв'язок</a></li>
		</ul>
	</header>

	<div class="system"> 
	</div>

	<div class="modal">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="username">Введіть ваш логін:</label>
			<input type="text" name="username">
			<label for="password">Введіть ваш пароль:</label>
			<input type="password" name="password1">
			<label for="password">Введіть пароль ще раз:</label>
			<input type="password" name="password2">
			<button type="submit" name="submit">Вхід</button>
		</form>
	</div>
     
    <div id="intro">
    </div>

    <hr>

    <div id="content">
        <h1>Ми виготовляємо:</h1>
            <ul class="cbp-rfgrid">
              	<li><a href="#"><img src="images/image4.jpg" width="400" height="150"/><div><h3>Кераміка</h3></div></a></li>
                <li><a href="#"><img src="images/image7.jpg" width="400" height="150"/><div><h3>Бюгельні протези</h3></div></a></li>
                <li><a href="#"><img src="images/прес.jpg" width="400" height="150"/><div><h3>Прес кераміка</h3></div></a></li>
                <li><a href="#"><img src="images/image5.jpg" width="400" height="150"/><div><h3>Протези</h3></div></a></li>
                <li><a href="#"><img src="images/нейлони.png" width="400" height="150"/><div><h3>Нейлони</h3></div></a></li>
                <li><a href="#"><img src="images/wax-up.jpg" width="400" height="150"/><div><h3>Wax-Up</h3></div></a></li>
            </ul>
	</div>
  
    <div id="contactwrapper">
        <div id="contact">
            <h1>Зв'яжіться з нами</h1>
            <form action="">
	            <label for="regularInput">Ім'я</label>
	            <input type="text" id="regularInput" />
	            <label for="regularInput">Email</label>
	            <input type="text" id="regularInput" />
	            <label for="regularTextarea">Повідомлення</label>
	            <textarea id="regularTextarea"></textarea>
	            <button type="submit">Відправити</button>
      		</form>
        </div>

   		<div id="map">
        	<div><a href="#"><img src="images/map.png" /></a></div>
    	</div>
    </div>
            
    <footer>
        <h1>Стежте за нами:</h1>
        <div id="footersocial">
			<li class="zocial-facebook"></li>
            	<li class="zocial-instagram"></li>
                <li class="zocial-linkedin"></li>
                <li class="zocial-pinterest"></li>
                <li class="zocial-google"></li>
                <li class="zocial-youtube"></li>
      		</ul>
        </div>
    </footer>   
</body>
</html>
