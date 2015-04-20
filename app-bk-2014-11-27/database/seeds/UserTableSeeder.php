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
			]);
	}
}

?>