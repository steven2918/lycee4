<?php 


class CommentTableSeeder extends Seeder {
	public function run() {
		DB::table('comments')->delete(); // supprimer les enregistrements de la table comments
		DB::unprepared('ALTER TABLE comments AUTO_INCREMENT=1'); // remettre l'auto increment à 1
// insérer des données dans la table comments
		DB::table('comments')->insert(
			[
			[
			'post_id' => 2,
			'title' => "Intéressant",
			'content' => 'Je trouve cet article intéressant',
			'created_at' => date("Y-m-d"),
			'status' => 1,
			'pseudo' => "Pierre Du 43",
			'email' => 'mail@mail.fr',
			],
			[
			'post_id' => 3,
			'title' => "Génial",
			'content' => 'Trop génial',
			'created_at' => date("Y-m-d"),
			'status' => 1,
			'pseudo' => "Jeano",
			'email' => 'mail2@mail.fr',
			],
			[
			'post_id' => 4,
			'title' => "Bof",
			'content' => 'Moyen, moyen tout ça',
			'created_at' => date("Y-m-d"),
			'status' => 1,
			'pseudo' => "Michel",
			'email' => 'mail3@mail.fr',
			],
			[
			'post_id' => 2,
			'title' => "pas vraiment",
			'content' => 'Je trouve cet article inutile',
			'created_at' => date("Y-m-d"),
			'status' => 1,
			'pseudo' => "Paul",
			'email' => 'mail4@mail.fr',
			],
			[
			'post_id' => 2,
			'title' => "Nul",
			'content' => 'Oui j\'aime critiquer',
			'created_at' => date("Y-m-d"),
			'status' => 1,
			'pseudo' => "Jacques",
			'email' => 'mail5@mail.fr',
			],
			]);
	}
}

?>