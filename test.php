<?php 

$id = $_GET['key'];

$filelist = glob('tests/*.json');

foreach ($filelist as  $key => $filename) {
	if ($key == $id) {	
		$file = file_get_contents($filename);
		$json = json_decode($file, true);
	} elseif ($id >= count($filelist)){
		http_response_code(404);
		echo 'Данного теста не существует';
		echo '<br>';
		echo '<br>';
		echo ' <a href="admin.php">Загрузить новый тест</a>';
		echo '<br>';
		echo '<br>';
		echo ' <a href="list.php">Перейти к списку тестов</a>';
		exit;
	}

}

if (isset($_POST['button'])) {

	if (!empty($_POST['name'])) {
		echo $_POST['name'] . "!" . '<br>'; 
		echo '<br>';	
	} 
$mark = 0;
	foreach($json as $number => $questions) {
	
		if (empty($_POST['q' . $number])) {
			
			echo $questions['question'] . " - Вы не ответили на данный вопрос" . '<br>';

		} elseif ($_POST['q' . $number] === $questions['rightAnswer']) {

			echo $questions['question'] . " - Вы ответили верно!" . '<br>'; 	
			
			$mark++;

		} else {

				echo  $questions['question'] . " - Вы ответили неверно! Правильный ответ - {$questions['rightAnswer']}" . '<br>';					
		}

	}
	
	echo '<br>' . "Правильных ответов - $mark" . '<br>';

	echo '<br>' . "<img src='img.php?mark=$mark'. />" . '<br>';

	echo '<br>' . '<a href="admin.php">Загрузить новый тест</a>' . '<br>';	
	echo '<br>' . '<a href="list.php">Перейти к списку тестов</a>' . '<br>' . '<br>';

exit;

	}

?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
        
    </head>
    <body>
    	 
		<form action="" method="POST">
		   <label>Введите Ваше имя <input type="text" name="name" value=""></label>

			<fieldset>

				<?php foreach($json as $number => $questions): ?>

			        <legend><?php echo $questions['question']; ?></legend>

				        <?php foreach($questions['variantsOfAnswers'] as $key => $variant): ?>
				            <label><input type="radio" name="<?php echo "q" . $number; ?>" value="<?php echo $key; ?>"><?php echo $variant; ?></label>
				        <?php endforeach; ?> 

				 <?php endforeach; ?>         
			    
		    </fieldset>
		    <button type="submit" name="button">Проверить</button>
		</form>

		<p><a href = "admin.php">Загрузить новый тест</a></p>
		
		<p><a href = "list.php">Перейти к списку тестов</a></p>

</body>
</html>



