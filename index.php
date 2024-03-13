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
					<div class="layer layers__base" style="background-image: url(img/index/layer-base.png);"></div>
					<div class="layer layers__middle" style="background-image: url(img/index/layer-middle.png);"></div>
					<div class="layer layers__front" style="background-image: url(img/index/layer-front.png);"></div>
				</div>
			</header>
		
			<article class="main-article" style="background-image: url(img/index/dungeon.png);">
			</article>

			<article class="main-article" style="background-image: url(img/index/dungeon2.png);">

        <a class="text_menu"> Menu </a>

        <!-- категории напитков -->
        <a class="text_menu_category_classic"> Classic coffee </a>
        <a class="text_menu_category_branded"> Branded drinks </a>
        <a class="text_menu_category_tea"> Tea </a>
        <a class="text_menu_category_milkshake"> Milkshake </a>

        <!-- классический кофе -->
        <a class="text_menu_classic_americano"> Americano </a> 
        <a class="text_menu_classic_cappuccino"> Cappuccino </a>
        <a class="text_menu_classic_latte"> Latte </a>

        <a class="text_menu_classic_200ml"> 200ml </a>
        <a class="text_menu_classic_300ml"> 300ml </a>
        <a class="text_menu_classic_400ml"> 400ml </a>

        <a class="text_menu_classic_110"> 110 </a> <a class="text_menu_classic_135"> 135 </a> <a class="text_menu_classic_155"> 155 </a>
        <a class="text_menu_classic_130"> 130 </a> <a class="text_menu_classic_150"> 150 </a> <a class="text_menu_classic_180"> 180 </a>
        <a class="text_menu_classic_140"> 140 </a> <a class="text_menu_classic_160"> 160 </a> <a class="text_menu_classic_190"> 190 </a>
        
        <!-- фирменные напитки -->
        <a class="text_menu_branded_nighthorm"> Nighthorm </a> 
        <a class="text_menu_branded_matchalatte"> Matcha latte </a>
        <a class="text_menu_branded_vanillaraf"> Vanilla raf </a>
        <a class="text_menu_branded_cheeseraf"> Cheese raf </a>

        <a class="text_menu_branded_200ml"> 200ml </a>
        <a class="text_menu_branded_300ml"> 300ml </a>
        <a class="text_menu_branded_400ml"> 400ml </a>

        <a class="text_menu_branded_110"> 110 </a> <a class="text_menu_branded_130"> 130 </a> <a class="text_menu_branded_155"> 155 </a>
        <a class="text_menu_branded_120"> 120 </a> <a class="text_menu_branded_145"> 145 </a> <a class="text_menu_branded_170"> 170 </a>
        <a class="text_menu_branded_135"> 135 </a> <a class="text_menu_branded_150"> 150 </a> <a class="text_menu_branded_180"> 180 </a>
        <a class="text_menu_branded_140"> 140 </a> <a class="text_menu_branded_160"> 160 </a> <a class="text_menu_branded_190"> 190 </a>

        <!-- чай -->
        <a class="text_menu_tea_greentea"> Green tea </a> 
        <a class="text_menu_tea_whitetea"> White tea </a>
        <a class="text_menu_tead_wheelingtea"> Wheeling tea </a>
        <a class="text_menu_tea_blacktea"> Black tea </a>

        <a class="text_menu_tea_200ml"> 200ml </a>
        <a class="text_menu_tea_300ml"> 300ml </a>
        <a class="text_menu_tea_400ml"> 400ml </a>

        <a class="text_menu_tea_105"> 105 </a> <a class="text_menu_tea_130"> 130 </a> <a class="text_menu_tea_155"> 155 </a>
        <a class="text_menu_tea_120"> 120 </a> <a class="text_menu_tea_150"> 150 </a> <a class="text_menu_tea_160"> 160 </a>
        <a class="text_menu_tea_110"> 110 </a> <a class="text_menu_tea_140"> 140 </a> <a class="text_menu_tea_165"> 165 </a>
        <a class="text_menu_tea_100"> 100 </a> <a class="text_menu_tea_135"> 135 </a> <a class="text_menu_tea_175"> 175 </a>

        <!-- молочные коктейли -->
        <a class="text_menu_milkshake_strawberry"> Strawberry </a> 
        <a class="text_menu_milkshake_chocolate"> Chocolate </a>
        <a class="text_menu_milkshake_snickers"> Snickers </a>
        <a class="text_menu_milkshake_blackberry"> Blackberry </a>

        <a class="text_menu_milkshake_400ml"> 400ml </a>

        <a class="text_menu_milkshake_230"> 230 </a>
        <a class="text_menu_milkshake_240"> 240 </a>
        <a class="text_menu_milkshake_250"> 250 </a>
        <a class="text_menu_milkshake_260"> 260 </a>

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
        
			    </article>
		    </div>
	    </div>
</body>

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

</html>