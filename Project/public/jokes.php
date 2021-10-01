<?php

try {
  include __DIR__ . '/../includes/DatabaseConnection.php';
  include_once __DIR__ . '/../includes/DatabaseFunctions.php';

    $result = findAll($pdo, 'joke');

    $jokes = [];
 
	foreach ($result as $joke) {
		$author = findById($pdo, 'author', 'id', $joke['authorId']);

		$jokes[] = [
			'id' => $joke['id'],
			'joketext' => $joke['joketext'],
			'jokedate' => $joke['jokedate'],
			'name' => $author['name'],
			'email' => $author['email']
		];

	}

    $title = 'List of Humour';
    $totalJokes = total($pdo, 'joke');

    ob_start();
    
    include  __DIR__ . '/../templates/jokes.html.php';

    $output = ob_get_clean();

  } catch (PDOException $e) {
    $title = 'An Error has been occurred';

    $output = 'Database Error: ' . $e->getMessage() . ', Location: ' .
    $e->getFile() . ':' . $e->getLine();
  }

include  __DIR__ . '/../templates/layout.html.php';