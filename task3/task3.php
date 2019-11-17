

	<b>TASK 3</b> <br>
	<form method="post" >
		<p>Длина числовой последовательности: <input type="text" name="n" size="2" required /></p>
		<p>Найти индекс для числа: <input type="text" name="k" size="2" required /></p>
 		<p><input type="submit" /></p>
	</form>


<?php
	
	if (isset($_POST['n'])) {
		// Перенесем из POST в переменные 
		$n = $_POST['n'];
		$k = $_POST['k'];


		$seqArray = range(1, $n); // Сгенерируем последовательность от 1 до n
		sort($seqArray, SORT_STRING); // Отсортируем как строки
		$seqArray = array_filter(array_merge(array(0), $seqArray)); // Сменим индексацию, чтоб было как в задании(нумерация с единицы, а не с нуля)

		echo "Полученная последовательность: <pre>";
		print_r($seqArray);
		echo "</pre><br>";

		$ind = array_search($k, $seqArray); // Найдем позицию элемента k. Если элемент не нашелся, то выкинет false.
		echo "Ищем число " . $k . "...<br>";
		echo ($ind==false) ? "Ошибка. Вылет за пределы(вселенной)." : "Позиция элемента в последовательноси: " . $ind . "<br>";

	}

	echo "<br><br> <a href='../'> <== Back <== </a>";

 ?>