<?php 


class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete(); // supprimer les enregistrements de la table users
		DB::unprepared('ALTER TABLE users AUTO_INCREMENT=1'); // remettre l'auto increment à 1
// insérer des données dans la table users
		DB::table('users')->insert(
			[
			[
			'username' => "steven",
			'password' =>  Hash::make('mdpsteven'),
			'role' => 'first_class',
			],
			[
			'username' => "julien",
			'password' =>  Hash::make('mdpjulien'),
			'role' => 'final_class',
			],
			[
			'username' => "admin",
			'password' =>  Hash::make('mdpadmin'),
			'role' => 'teacher',
			],
			[
			'username' => "prof",
			'password' =>  Hash::make('mdpprof'),
			'role' => 'teacher',
			],
			[
			'username' => "Alexandre",
			'password' =>  Hash::make('mdpAlexandre'),
			'role' => 'teacher',
			],
			[
			'username'=> "Abel",
			'password' => Hash::make('mdpAbel'),
			'role' => 'first_class',
			],
			[
			'username'=> "Al",
			'password' => Hash::make('mdpAl'),
			'role' => 'first_class',
			],
			[
			'username'=> "Alan",
			'password' => Hash::make('mdpAlan'),
			'role' => 'first_class',
			],
			[
			'username'=> "Arthur",
			'password' => Hash::make('mdpArthur'),
			'role' => 'first_class',
			],
			[
			'username'=> "Carl",
			'password' => Hash::make('mdpCarl'),
			'role' => 'first_class',
			],
			[
			'username'=> "Blaise",
			'password' => Hash::make('mdpBlaise'),
			'role' => 'first_class',
			],
			[
			'username'=> "Isaac",
			'password' => Hash::make('mdpIsaac'),
			'role' => 'first_class',
			],
			[
			'username'=> "Steve",
			'password' => Hash::make('mdpSteve'),
			'role' => 'first_class',
			],
			[
			"username" => "Alfred",
			'password' => Hash::make('mdpAlfred'),
			'role' => 'final_class',
			],
			[
			"username" => "Brendan",
			'password' => Hash::make('mdpBrendan'),
			'role' => 'final_class',
			],
			[
			"username" => "David",
			'password' => Hash::make('mdpDavid'),
			'role' => 'final_class',
			],
			[
			"username" => "George",
			'password' => Hash::make('mdpGeorge'),
			'role' => 'final_class',
			],
			[
			"username" => "Jim",
			'password' => Hash::make('mdpJim'),
			'role' => 'final_class',
			],
			[
			"username" => "Leslie",
			'password' => Hash::make('mdpLeslie'),
			'role' => 'final_class',
			],
			[
			"username" => "Maria",
			'password' => Hash::make('mdpMaria'),
			'role' => 'final_class',
			],
			[
			"username" => "Rasmus",
			'password' => Hash::make('mdpRasmus'),
			'role' => 'final_class',
			],
			[
			"username" => "Tim",
			'password' => Hash::make('mdpTim'),
			'role' => 'final_class',
			],


			]);
}
}

?>