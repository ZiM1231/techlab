<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson');
if(!isset($_COOKIE['user_id'])) {
  if(isset($_POST['submit'])) {
    $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    if(!empty($user_username) && !empty($user_password)) {
      $query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
      $data = mysqli_query($dbc,$query);
      if(mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
        setcookie('username', $row['username'], time() + (60*60*24*30));
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header('Location: '. $home_url);
      }
            else {
                  echo 'Вибачте, неправильно введені дані';
               }
            }
            else {
               echo 'Вибачте, Ви повинні заповнити поля правильно';
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
<link href="assets/css/style.css" rel="stylesheet" />
 <style>
   hr {
    border: none; 
    background-color: grey; 
    color: red; 
    height: 2px; 
   }

   .thumb img  {
    padding: 15px; /* Расстояние от картинки до рамки */
    margin-right: 10px; /* Отступ справа */
    margin-bottom: 10px; /* Отступ снизу */
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

<div id="co1">
     <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
      <div id="drop">
          .......

        <a>Загрузка</a>
        <input type="file" name="upl" multiple />
      </div>
      <ul>
      </ul>
    </form>
        </div>
    <hr>
    <h1>Галарея</h1>
    <p class="thumb">  
     <?php
      $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
      $arr = scandir($path);
      foreach($arr as $v) {
        if(stripos($v,'.jpg'))  echo '<img src="/uploads/', htmlspecialchars(urlencode($v)),'" width="400" hegiht="200"/>';
      }
    ?>        
    </p>




     
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
         

<!-- JavaScript Includes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/jquery.knob.js"></script>

    <!-- jQuery File Upload Dependencies -->
    <script src="assets/js/jquery.ui.widget.js"></script>
    <script src="assets/js/jquery.iframe-transport.js"></script>
    <script src="assets/js/jquery.fileupload.js"></script>
    
    <!-- Our main JS file -->
    <script src="assets/js/script.js"></script>





      </body>
</html>
