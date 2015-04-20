<?php 


class PostTableSeeder extends Seeder {
	public function run() {
		DB::table('posts')->delete(); // supprimer les enregistrements de la table posts
		DB::unprepared('ALTER TABLE posts AUTO_INCREMENT=1'); // remettre l'auto increment à 1
// insérer des données dans la table posts
		DB::table('posts')->insert(
			[
			[
			'user_id' => 1,
			'title' => 'Mon premier post',
			'abstract' => 'Extrait de l\'article',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'url_thumbnail' => 'Desert.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 1,
			'title' => 'Les suites récurrentes',
			'abstract' => 'L\'étude des suites récurrentes, extrait',
			'content' => 'L\'étude des suites récurrentes linéaires d\'ordre supérieur se ramène à un problème d\algèbre linéaire. L\'expression du terme général d\'une telle suite est possible ...',
			'url_thumbnail' => 'Koala.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 1,
			'title' => 'Mon second post',
			'abstract' => 'Article sur le théorème de Thalès',
			'content' => 'Contenu de l\'Article sur le théorème de Thalès.',
			'url_thumbnail' => 'Phare.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 1,
			'title' => 'Mon dernier post',
			'abstract' => 'Les maths et la vie',
			'content' => 'blabalabla.',
			'url_thumbnail' => 'Hortensias.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"unpublish",
			],
			]);
	}
}

?>