<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connect = new PDO("mysql:host=localhost; dbname=nighthorm;", 'root','root');
    if (isset($_POST['date'])) { //isset for date
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guestcount = $_POST['guestcount'];
        $name = $_POST['name'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $status = "ожидает подтверждения";
        $query = $connect->query ("INSERT INTO nighthorm.reservation (date,time,guestcount,name,phonenumber,email,status) VALUES ('$date','$time','$guestcount','$name','$phonenumber','$email','$status')");
        }
    // Перенаправление на текущую страницу
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
  }
?>

<style>
        #myBtn{
            position: absolute;
            margin-top: calc(var(--index) * 19.2);
            margin-left: calc(var(--index) * 35);
            font-size: calc(var(--index) * 0.85);
            color: #5c5c5c; /* Цвет обычной ссылки */
            cursor: pointer;
            text-decoration: none; /* Убираем подчеркивание */
        }
        #myBtn:after{
            content: "";
            display: block;
            position: absolute;
            right: 0;
            bottom: -3px;
            width: 0;
            height: 2px; /* Высота линии */
            background-color: black; /* Цвет подчеркивания при исчезании линии*/
            transition: width 0.5s; /* Время эффекта */
        }
        #myBtn:hover:after{
            content: "";
            width: 100%;
            display: block;
            position: absolute;
            left: 0;
            bottom: -3px;
            height: 2px; /* Высота линии */
            background-color: rgb(0, 0, 0); /* Цвет подчеркивания при появлении линии*/
            transition: width 0.5s;  /* Время эффекта */
        }
        .modal {
            display: none; /* Hidden by default */
            position: relative; /* Stay in place */
            padding-top: 20%;
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0); /* Black w/ opacity */
        }
        .modal-content {
            font-family: raleway_f;
            position: relative;
            background-color: rgb(255, 255, 255);
            margin: auto;
            padding: 0;
            border: 5px solid rgb(162, 134, 94);
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0} 
            to {top:0; opacity:1}
        }
        @keyframes animatetop { 
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }
        .close { /*крестик при бездействии*/
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus { /*крестик при нажатии*/
            color: #ff0000;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-header { /*шапка*/
            padding: 2px 10px;
            background-color: rgb(255, 222, 184);
            color: white;
        }
        .modal-body {
            padding: 2px 16px;
        } 
        .modal-footer { 
            padding: 2px 16px;
            background-color: rgb(255, 207, 117);
            color: white;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="libs/gsap/gsap.min.js" defer></script>
	<script src="libs/gsap/ScrollTrigger.min.js" defer></script>
	<script src="libs/gsap/ScrollSmoother.min.js" defer></script>
	<script src="js/app.js" defer></script>
</head>
<body>
	<div class="wrapper">
		<div class="content">
			<header class="main-header">
				<div class="layers">
					<div class="layer__header">
						<div class="layers__caption">Coffee & Tea</div>
						<div class="layers__title">Nighthorm</div>
					</div>
					<div class="layer layers__base" style="background-image: url(img/whoisnayjk/layer-base.png);"></div>
					<div class="layer layers__middle" style="background-image: url(img/whoisnayjk/layer-middle.png);"></div>
					<div class="layer layers__front" style="background-image: url(img/whoisnayjk/layer-front.png);"></div>
				</div>
			</header>
			<article class="main-article" style="background-image: url(img/whoisnayjk/dungeon.png);"> </article>
			<article class="main-article" style="background-image: url(img/whoisnayjk/dungeon2.png);">
        <a class="namjoon"> Coffeehouse owner: </a>
        <a class="yoongi"> Cat owner: </a>
        <a class="jungkook"> Best Employee of the Month: </a>
        <a class="v"> Best Employee of the Month: </a>
        <!-- список статей -->
        <a href="nighthormstory.php" class="layers__caption2">Nighthorm story</a>
        <a href="index.php" class="layers__caption3">Home page</a>
		<a id="myBtn">Reservation</a>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                        <h2><center>Забронировать столик</center></h2>
                </div>
                <div class="modal-body"> 
                    <form action="" method="POST" name="Form" onsubmit="return validateForm()"> 
                        <div class="ui-widget">
                            <label for="datep">Дата:</label>
                            <input name="date" id="datep" required />
                        </div>
                        <input type="time" name="time" placeholder="время резервации" required><br>
                        <input type="text" name="guestcount" placeholder="число гостей" required><br>
                        <input type="text" name="name" placeholder="имя" required><br>
                        <input type="text" name="phonenumber" placeholder="номер телефона" required><br>
                        <input type="text" name="email" placeholder="почта" required><br>
                        <input type="submit">
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
        <a href="https://vk.com/public169777064" class="nayjk">Nayjk' Qq'phtshdark'sleep (Darkwillow) x Kim Namjoon (RM)</a>
			</article>
		</div>
	</div>
</body>
</html>

<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
    <script src="calendar1.js"></script>
    <script src="calendar2.js"></script> 
    <link rel="stylesheet" href="calendar.css">
    <style type="text/css">
        input {width: 200px; text-align: left}
    </style> 
    <script type="text/javascript">
        $(function() {
        $('#datep').datepicker();
		});
    </script>