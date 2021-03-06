<?php
namespace Ijdb;

class IjdbRoutes implements \Hanbit\Routes {
	public function getRoutes() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$jokesTable = new \Hanbit\DatabaseTable($pdo, 'joke', 'id');
		$authorsTable = new \Hanbit\DatabaseTable($pdo, 'author', 'id');

		$jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
		$authorController = new \Ijdb\Controllers\Register($authorsTable);

		$routes = [
			'author/register' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'registerUser'
				]
			],
			'author/success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],
			'joke/edit' => [
				'POST' => [
					'controller' => $jokeController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $jokeController,
					'action' => 'edit'
				]
				
			],
			'joke/delete' => [
				'POST' => [
					'controller' => $jokeController,
					'action' => 'delete'
				]
			],
			'joke/list' => [
				'GET' => [
					'controller' => $jokeController,
					'action' => 'list'
				]
			],
			'' => [
				'GET' => [
					'controller' => $jokeController,
					'action' => 'home'
				]
			]
		];

		return $routes;
	}
}