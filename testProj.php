<!DOCTYPE HTML>
<!--страничка для отработки навыков-->
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="ttt_style.css">
	<title>Страница</title>
</head>
<body>	
		<article id = "fst">
			<section id="bd">
				<?php
				function db(){
				$name = $_POST["name"];
				$psw = $_POST["psw"];
				$pswh = md5($psw);
				$email = $_POST["email"];
				$date = $_POST["date"];
		        $dblocation = "127.0.0.1";
		        $dbname = "cl01044_bd";
		        $dbuser = "cl01044_bd";
		        $dbpasswd = "12345";
			    $dbcnx = mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);
			      if(!$dbcnx){
				    echo "Нет коннект";
				    exit();
			      }
			      if($name!=NULL && $psw!=NULL){
			        $gvn = mysqli_query($dbcnx, "INSERT INTO users (username, password, email, join_date) VALUES ('$name', '$pswh', '$email', '$date')");
			      }
			    $ver = mysqli_query($dbcnx, "SELECT * FROM users");
			      while($row = mysqli_fetch_assoc($ver)){
				    echo $row['id']." ";
				    echo $row['username']."<br>";
				    echo $row['password']."<br>";
				    echo $row['email']."<br><hr>";
			      }
			      if(!$ver){
				    echo "ошибка в запросе";
				    exit();
			      }
			    }
			    if(isset($_POST["name"])){	
					db();
				}  
		        ?>
			</section>
			<section id="matrix">
				<?php
				  function matrix(){
				    $file = fopen("test.txt", "a");
				    $str = $_POST["n"];
				    $stl = $_POST["m"];
				    $my_arr = array(array(),array());
				    for($i=0;$i<$str;$i++){
					  for($j=0;$j<$stl;$j++){
						$my_arr[$i][$j] = rand(-50, 50);
						echo ' | '.$my_arr[$i][$j];
						fwrite($file, ' | '.$my_arr[$i][$j]);
					  }
					  echo '<br/>';
					  fwrite($file, "\n");
				    }
				    fwrite($file, "\n");
				    echo '<hr>';
				    echo "Число элементов строки - ".count($my_arr[0]);
				    echo "<br/>";
				    for($i=0;$i<1;$i++){
					  for($k=0;$k<$stl;$k++){
						echo ' | '.$my_arr[$i][$k];
					  }
					  echo '<br/>';
				    }
				    $l = 0;
			        $max = $my_arr[1][$stl-1];
			        for( $i=1;$i<$str;$i++){
			          for( $j=$stl-$i;$j<$stl;$j++){
			            if($my_arr[$i][$j] > $max){
							$max = $my_arr[$i][$j];
			                $l = 1;
			            }
			            else if($my_arr[$i][$j] == $max){
							$l++;
			            }
			          }
				    }
			        echo "Максимальный элемент ниже побочной диагонали ".$max."<br>";
				    echo "Количество макс. элементов ".$l."<br>";
				  }
				  if(isset($_POST["n"])){	
			        matrix();
				  }  
				?>
			</section>
		</article>
		<article id = "cst">
		  <section id = "form">
		  <form id = "sss" method = "POST">
				<input id="name" type = "text" name = "name" placeholder = "имя" autofocus />
				<input id="email" type = "email" name = "email" placeholder = "email"/><br>
				<input id="psw" type = "text" name = "psw" placeholder = "пароль"/>
				<input id="date" type = "datetime-local" name = "date" placeholder = "дата записи"/>
				<input class = "in" type = "text" name = "n" placeholder = "строки матрицы"/>
				<input class = "in" type = "text" name = "m" placeholder = "столбцы"/><br>
				<button id="push">Дави</button>
		  </form>
		  <form id="form_clr" method = "GET" action = "ttt_in.php">
				<input id="clr_bd" type = "submit" name = "clear" value = "Очистка БД"/>
	      </form>
		  </section>
		  </article>
		  <div>
		  <div id="panel">
		  	<section class="pnl">
		  	Текущее время
		    </section>
		    <section class="pnl">
		  	Счетчик
		    </section>
		    <section id="todate1">
		  	Дата
		    </section>
		  </div>
		  <div id="tst">
		  <section id = "time_td">
		  	<script src="time.js"></script>
		  </section>
		  <section id="while">
		  	<script src = "counter.js"></script>
		  </section>
		  <section id="todate2">
		  	<?php
				$dt = date("d.m.y", time());
				echo $dt;
			?>
		  </section>
		</div>
		</div>
		<footer id="footer" align = "center">
            __________________________________
        </footer>
</body>
</html>