<?php 

/*
	Из проблем:
	- Строка меньше 200 символов. - Но это не страшно, возьмём сколько есть.
	- Количество слов меньше трёх. - Тогда обернём столько слов, сколько есть.
	- Строка заканчивается многоточием. - Получится к одному добавим ещё и своё многоточие.
*/


	
	/**
	*  Возвращает строку @str 
	*  где последние @cnt слов обернуты в ссылку @plink
	*/ 
	function wrapLastWords($str, $cnt, $plink){
		$tempMas = explode(' ', $str); // Взорвём строку и получим массив слов
		$masLength = count($tempMas);  // Возьмем длину массива (количество слов)

		$tempStr = ""; // Результирующая строка. Пока пустая.
		
		if ($masLength>$cnt) {
			// Если слов хватает
			// Первые слова возвращаем в строку без изменений.
			for ($i=0; $i < $masLength-$cnt; $i++) { 
				$tempStr .= $tempMas[$i] . ' ';
			}

			// Последние $cnt слов отправляем в ссылку
			$tempStr .= "<a href='$plink'>";
			for ($i=$masLength-$cnt; $i < $masLength; $i++) { 
				$tempStr .= $tempMas[$i] . ' ';
			}
			$tempStr .= "...</a>";
			
		} else {
			// Если слов меньше, чем нужно
			// то обернём всё что есть
			$tempStr .= "<a href='$plink'>";
			for ($i=0; $i < $masLength; $i++) {
				$tempStr .= $tempMas[$i] . ' ';
			}
			$tempStr .= "...</a>";
		}
		
		return $tempStr;
	}



	// Для примера
	$articleText = "Переменные в PHP представлены знаком доллара с последующим именем переменной. Имя переменной чувствительно к регистру.";
	// $articleText = "Raz Dva";
	//articleText = "";
	$articleLink = "https://www.php.net/manual/ru/language.variables.basics.php";

	// Вырежем 200 символов из строки. 
	// Если их меньше, то это ничего страшного. Возьмем сколько есть.
	$articlePreview = substr($articleText, 0, 199); 
													


	echo "<b>TASK 1</b> <br>";

	$articlePreview = wrapLastWords($articlePreview, 3, $articleLink); // <- Вызов функции для обертки последних трёх слов в ссылку
	echo $articlePreview;

	echo "<br><br> <a href='../'> <== Back <== </a>";

 ?>