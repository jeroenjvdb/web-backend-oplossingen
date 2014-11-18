<?php
	session_start();
	//echo $_SESSION['toDo'][0];
	if(isset($_POST['addToDo'])){
		$_SESSION['toDo'][] = $_POST['description'];

	} elseif(isset($_POST['toggleTodo'])){
		echo ( $_POST['toggleTodo']);
		if($_GET['done'] == 0){
			$_SESSION['done'][] = $_SESSION['toDo'][$_POST['toggleTodo']];
			unset($_SESSION['toDo'][$_POST['toggleTodo']]);
		} elseif ($_GET['done']==1){
			$_SESSION['toDo'][] = $_SESSION['done'][$_POST['toggleTodo']];
			unset($_SESSION['done'][$_POST['toggleTodo']]);
		}

		
	} elseif(isset($_POST['deleteTodo'])){
		if($_GET['done'] == 0){
			unset($_SESSION['toDo'][$_POST['deleteTodo']]);
		} elseif ($_GET['done'] == 1){
			unset($_SESSION['done'][$_POST['deleteTodo']]);
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To do</title>
	<link rel="stylesheet" type="text/css" href="global.css">
</head>
<body>
	<h1>To do app</h1>
	<h2>Nog te doen</h2>
	<ul>
		<?php foreach ($_SESSION['toDo'] as $key => $value): ?>
			
			
				<li>
					<form action="to-do.php?done=0" method="POST">
						<button title="status wijzigen" name="toggleTodo" value="<?= $key ?>" class="status not-done"><?= $value ?></button>
						<button title="verwijderen" name="deleteTodo" value="<?= $key ?>">verwijderen</button>
					</form>
				</li>
			
		<?php endforeach; ?>
	</ul>
	<h2>Done and done</h2>
	<ul>
		<?php foreach ($_SESSION['done'] as $key => $value): ?>
			
				<li>
					<form action="to-do.php?done=1" method="POST">
						<button title="status wijzigen" name="toggleTodo" value="<?= $key ?>" class="status done"><?= $value ?></button>
						<button title="verwijderen" name="deleteTodo" value="<?= $key ?>">verwijderen</button>
					</form>
				</li>
			
		<?php endforeach; ?>
	</ul>
	<h2>to do toevoegen</h2>
	<form action="to-do.php" method="POST">	
		<ul>
			<li>
				<label for="description">beschrijving</label>
				<input type="text" id="description" name="description">
			</li>
		</ul>
		<input type='submit' name='addToDo' value='toevoegen'>
	</form>
</body>
</html>