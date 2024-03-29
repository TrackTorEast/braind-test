

	<b>TASK 2</b> <br>
	<form method="post" >
		<p>Ошибок: <input type="text" name="errors" size="2" required /> >= 0 </p>
		<p>Ворнингов: <input type="text" name="warnings" size="2" required /> <= 1000</p>
 		<p><input type="submit" /></p>
	</form>



<?php 

	/**
	*	Решает задачу поиска минимального числа коммитов для исправления программы
	*	$errCnt - кочисество ошибок
	*	$wrnCnt - количество ворнингов
	*	Если задача нерешаема - вернёт -1
	*/
	function trySolve($errCnt, $wrnCnt){
		$commitCnt = 0;
		
		// Убераем ошибки
		if ($errCnt%2==0) {
			// Если ошибок четное число
			// То можно их все убрать за n/2 коммитов
			$commitCnt += $errCnt/2;
			$errCnt = 0;

			if ($wrnCnt>0) {
				// Если ворнинги есть
				// Делаем из ворнингов четное число ошибок
				while (fmod(($wrnCnt / 2), 2)<>0) {
					$commitCnt += 1;
					$wrnCnt += 1;
				}
				// Исправим ворнинги
				$commitCnt += $wrnCnt/2; 
				$errCnt += $wrnCnt/2; 
				// Исправим ошибки
				$commitCnt += $errCnt/2;
			}
			// Если ворнингов нет, то собственно всё
			
		} else {
			// Если ошибок нечетное число
			// То уберем максимум пар ошибок и останется одна ошибка
			$commitCnt += intdiv($errCnt, 2);
			$errCnt = 1;

			if ($wrnCnt==0) {
				// Если ворнингов нет, то мы проиграли
				return -1;
			} else {
				// Если есть хотя бы один ворнинг, то мы сможем победить

				// Делаем из ворнингов нечётное число ошибок
				while ( (fmod(($wrnCnt / 2), 2)==0) // Проверка на четное количество пар
						|| (!is_int($wrnCnt/2)) // Проверка на парность
				) {
					$commitCnt += 1;
					$wrnCnt += 1;
				}
				// Исправим ворнинги
				$commitCnt += $wrnCnt/2;
				$errCnt += $wrnCnt/2;
				// Исправим ошибки
				$commitCnt += $errCnt/2;
			}
		}

		return $commitCnt;
	}



	if (isset($_POST['errors'])) {
		// Перенесем из POST в переменные 
		$n = $_POST['errors'];
		$k = $_POST['warnings'];

		if ( ($n>=0) && ($k<=1000) ) {
			echo "Результат: " . trySolve($n, $k); // <- вызов основной функции
		} else {
			echo "Числа не удовлетворяют условию";
		}
	}

	//echo intdiv(5, 2);
	//echo fmod((3 / 2), 2);
	// echo is_int(6/2);

	echo "<br><br> <a href='../'> <== Back <== </a>";

 ?>