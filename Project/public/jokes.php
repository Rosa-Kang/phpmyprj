<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8', 'ijdbuser', 'mypassword');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT `id`, `joketext` FROM `joke`';
  $jokes = $pdo->query($sql);

//   // while ($row = $result->fetch()) {
//   //    $jokes[] = ['id' => $row['id'], 'joketext' => $row['joketext']];
//   // }

// foreach($result as $row) {
//     $jokes[] = array('id' => $row['id'], 'joketext' => $row['joketext']);
// }

  $title = 'List of Humour';

  ob_start();

  include  __DIR__ . '/../templates/jokes.html.php';

  $output = ob_get_clean();

}
catch (PDOException $e) {
  $title = 'An Error has been occurred';

  $output = 'Database Error: ' . $e->getMessage() . ', Location: ' .
  $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';