<?php

namespace Database\Seeders;
use Faker\Factory;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	UserSeeder::class,
        	SlideSeeder::class,
        	TypeOfNewSeeder::class,
        	MessageSeeder::class,
        	ServerGameSeeder::class,
        	LikeViewSeeder::class,
        	ProductSeeder::class,
        	NewSeeder::class,
        	CommentSeeder::class
        ]);
    }
}

class UserSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;
		DB::table('users')->insert([
			'username' => 'supperadmin',
			'password' => Hash::make('abc123'),
			'email' => 'supperadmin@gmail.com',
			'nickname' => 'Ông Trùm',
			'sdt' => '0924008990',
			'fb' => 'https://facebook.com/trunghoang732kt',
			'exp' => 100,
			'level' => 5
		]);
		for ($i = 0; $i <= $limit; $i++) {
			DB::table('users')->insert([
				'username' => str_random(10),
				'password' => Hash::make(1),
				'email' => str_random(15) . '@gmail.com',
				'nickname' => $faker->name,
				'sdt' => $faker->phoneNumber,
				'fb' => $faker->url,
				'exp' => rand(1, 99),
				'level' => 0
			]);
		}
	}
}

class SlideSeeder extends Seeder
{
	public function run()
	{
		DB::table('slides')->insert([
			['url' => 'https://via.placeholder.com/700x300'],
			['url' => 'https://via.placeholder.com/700x300'],
			['url' => 'https://via.placeholder.com/700x300']
		]);
	}
}

class TypeOfNewSeeder extends Seeder
{
	public function run()
	{
		DB::table('type_of_news')->insert([
			['type' => 'Thông báo'],
			['type' => 'Góp ý']
		]);
	}
}

class MessageSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('messages')->insert([
				'tieude' => $faker->sentence($nbWords = 6, $variableNbWords = true),
				'noidung' => $faker->paragraph,
				'thoigian' => $faker->dateTime($max = 'now', $timezone = null),
				'nguoigui' => $faker->name,
				'nguoinhan' => 'Admin',
				'idLoaiTin' => rand(1, 50)
			]);
		}
	}
}

class ServerGameSeeder extends Seeder
{
	public function run()
	{
		DB::table('server_games')->insert([
			'servername' => "Ngọc Hổ",
		]);
		DB::table('server_games')->insert([
			'servername' => "Phi Hổ",
		]);
		DB::table('server_games')->insert([
			'servername' => "Phi Long",
		]);
	}
}

class LikeViewSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('like_views')->insert([
				'likeCount' => rand(10, 200),
				'viewCount' => rand(100, 500),
				'dislikeCount' => rand(5, 100),
			]);
		}
	}
}

class ProductSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('products')->insert([
				'thumbnail' => "https://2img.net/h/3.bp.blogspot.com/-ZBs7wwti4Ok/VaTdzuu5ISI/AAAAAAAAAnk/ULSjIru1he4/s640/vltk-2-offline-viet-hoa.jpg",
				'title' => $faker->name,
				'content' => $faker->paragraph,
				'serverID' => rand(1,2,3),
				'likeViewID' => rand(1,50),
				'userID' => rand(1, 50)
			]);
		}
	}
}



class NewsSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('news')->insert([
				'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
				'content' => $faker->paragraph,
				'userID' => rand(3, 35),
				'likeViewID' => rand(10, 50)
			]);
		}

	}
}

class CommentSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create('vi_VN');
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('comments')->insert([
				'content' => $faker->paragraph,
				'time' =>$faker->dateTime,
				'userID' => rand(1, 50),
				'newsID' => rand(1, 50)
			]);
		}
	}
}



