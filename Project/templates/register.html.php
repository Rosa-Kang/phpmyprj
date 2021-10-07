<?php
 if (!empty($errors)):
?>
<div class='error'>
    <p>We cannot register the user. Please get advised from below.</p>
    <ul>
        <?php
        foreach($errors as $error) :
        ?>
        <li><?=$error ?></li>
        <?php
        endforeach;
        ?>
    </ul>
</div>
<?php
endif;
?>

<form action="" method="post">
<label for="email">Email</label>
<input name="author[email]" id="email" type="text" value="<?=$author['email']?? '' ?>">

<label for="name">Name</label>
<input name="author[name]" id="name" type="text" value="<?=$author['name']?? '' ?>">

<label for="password">Password</label>
<input name="author[password]" id="password" type="text" value="<?=$author['password']?? '' ?>">

<input name="submit" value="User Registration" type="submit">
</form>