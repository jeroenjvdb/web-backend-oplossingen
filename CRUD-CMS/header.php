<header>
		<?php if(isset($_SESSION['notification'])): ?>
			<p class="<?= $_SESSION['notification']['type'] ?>"> <?= $_SESSION['notification']['text'] ?> </p>
		<?php endif ?>
		<p><a href="dashboard.php">Terug naar dashboard </a> | Ingelogd als <?= $email ?> | <a href="logout.php">uitloggen</a></p>
		<?php $_SESSION['notification'] = null ?>
</header>