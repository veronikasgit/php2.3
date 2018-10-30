<?php

$filelist = glob('tests/*.json');

?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
    </head>
    <body>
    	
        <ol>
            
                <?php foreach ($filelist as $key => $filename): ?>

                    <li><a href = "test.php?key=<?php echo $key; ?>"><?php  echo $filename . "<br>"; ?></a></li>

                <?php endforeach; ?>            
           
        </ol>       

<a href = "admin.php">Загрузить новый тест</a>

	</body>
</html>


