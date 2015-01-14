<?php
	class UsersTableSeeder extends Seeder {
		public function run() {
			DB::table('users')->delete();

			$users = array(
				array(
					'email' => 'test@test.be',
					'password' => Hash::make('test') 
				)
			);

			DB::table('users')->insert($users);
		}
	}


?>