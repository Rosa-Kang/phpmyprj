<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/jokes.css">
    <title><?=$title?></title>
  </head>
  <body>
  <nav>
    <header>
      <h1>Internet Humour World</h1>
    </header>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/joke/list">List of Jokes</a></li>
      <li><a href="/joke/edit">Add a Joke</a></li>
    </ul>
  </nav>

  <main>
  <?=$output?>
  </main>

  <footer>
  &copy; IJDB <?=date('Y') ?>
  </footer>
  </body>
</html>