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
			'user_id' => 2,
			'title' => 'Les suites récurrentes',
			'abstract' => 'L\'étude des suites récurrentes, extrait',
			'content' => 'L\'étude des suites récurrentes linéaires d\'ordre supérieur se ramène à un problème d\algèbre linéaire. L\'expression du terme général d\'une telle suite est possible ...',
			'url_thumbnail' => 'Koala.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 2,
			'title' => 'Mon second post',
			'abstract' => 'Article sur le théorème de Thalès',
			'content' => 'Contenu de l\'Article sur le théorème de Thalès.',
			'url_thumbnail' => 'Phare.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 3,
			'title' => 'Mon dernier post',
			'abstract' => 'Les maths et la vie',
			'content' => 'blabalabla.',
			'url_thumbnail' => 'Hortensias.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"unpublish",
			],
			[
			'user_id' => 2,
			'title' => 'Vive les chats',
			'abstract' => 'Les chats sont cool',
			'content' => 'Ce sont les maitres du monde e tpis c\'est tout',
			'url_thumbnail' => 'cat.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 2,
			'title' => 'Yeah',
			'abstract' => 'Un chat en concert',
			'content' => 'Quelques fausses notes mais ça passe ...',
			'url_thumbnail' => 'chat-rock.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 4,
			'title' => 'Guitare',
			'abstract' => 'Ceci est une guitare',
			'content' => 'elle est jolie.',
			'url_thumbnail' => 'guitar.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 4,
			'title' => 'Un autre post',
			'abstract' => 'Pas inspiré pour trouvé un extrait',
			'content' => 'Et encore moins du contenu',
			'url_thumbnail' => 'image3d.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 1,
			'title' => 'C\'est de l\'abstrait',
			'abstract' => 'un extrait',
			'content' => 'blabalabla.',
			'url_thumbnail' => 'land.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 1,
			'title' => 'Couchez de soleil',
			'abstract' => 'Paysage',
			'content' => 'blabalabla.',
			'url_thumbnail' => 'landscape.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 2,
			'title' => 'Ciel',
			'abstract' => 'Artificiel',
			'content' => 'Mais joli.',
			'url_thumbnail' => 'landscape2.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 2,
			'title' => 'Note de musique',
			'abstract' => 'Qui se disperse',
			'content' => 'blabalabla lorem.',
			'url_thumbnail' => 'music.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 3,
			'title' => 'Musique',
			'abstract' => 'La musique et la vie',
			'content' => 'blabalabla.',
			'url_thumbnail' => 'music2.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 3,
			'title' => 'Musique le retour',
			'abstract' => 'c\'est vraiment pour ajouter un extrait',
			'content' => 'et aussi du contenu.',
			'url_thumbnail' => 'music3.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],
			[
			'user_id' => 3,
			'title' => 'Mon dernier vrai post',
			'abstract' => 'et encore je vais en rajouter via l\'admin',
			'content' => 'ça devient long à rajouter quand même',
			'url_thumbnail' => 'tete.jpg',
			'created_at' => date("Y-m-d"),
			'status' =>"publish",
			],

			]);
	}
}

?>