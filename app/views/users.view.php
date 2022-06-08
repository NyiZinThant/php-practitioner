<?php require("partials/header.php"); ?> 

    <?php require("partials/nav.php"); ?>

    <ol>
        <?php foreach($users as $user): ?>
            <li><?= $user->name  ?></li>
        <?php endforeach; ?>
    </ol>

    <h1>Type your name</h1>

    <form action="/users" method="POST">
        <input type="text" name="name" placeholder="name">
        <button type="submit">Submit</button>
    </form>
    
<?php require("partials/footer.php"); ?>