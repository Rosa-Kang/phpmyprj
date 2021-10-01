<form action="" method="post">
<input type="hidden" name="joke[id]" value="<?=$joke['id'] ?? '' ?>">
<label for="joketext">Enter your joke :</label>
<textarea name="joke[text]" id="joketext" cols="40" rows="10">
    <?=$joke['joketext']?? ''?>
</textarea>
<input type="submit" value="Save">
</form>