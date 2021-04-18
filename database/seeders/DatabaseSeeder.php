<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        	// UserSeeder::class,
        	// SlideSeeder::class,
        	// TypeOfNewSeeder::class,
        	// MessageSeeder::class,
        	// ServerGameSeeder::class,
        	// LikeViewSeeder::class,
        	// ProductSeeder::class,
        	// NewsSeeder::class,
        	CommentSeeder::class
        ]);
    }
}

class UserSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		DB::table('users')->insert([
			'username' => 'supperadmin',
			'password' => '123',
			'email' => 'supperadmin@gmail.com',
			'nickname' => 'Ông Trùm',
			'sdt' => '0924008990',
			'fb' => 'https://facebook.com/trunghoang732kt',
			'exp' => 100,
			'level' => 5
		]);
		for ($i = 0; $i <= $limit; $i++) {
			DB::table('users')->insert([
				'username' => Str::random(10),
				'password' => '123',
				'email' => Str::random(15) . '@gmail.com',
				'nickname' =>Str::random(5),
				'sdt' => Str::random(10),
				'fb' => '',
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
		DB::table('sliders')->insert([
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
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('messages')->insert([
				'title' => Str::random(10),
				'content' => Str::random(50),
				'sender' => Str::random(10),
				'receiver' => 'Admin',
				'typeOfNewId' => rand(1, 2)
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
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('products')->insert([
				'thumbnail' => "https://2img.net/h/3.bp.blogspot.com/-ZBs7wwti4Ok/VaTdzuu5ISI/AAAAAAAAAnk/ULSjIru1he4/s640/vltk-2-offline-viet-hoa.jpg",
				'title' => Str::random(10),
				'content' => Str::random(50),
				'priceType' => 'vang',
				'serverID' => rand(1,3),
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
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('news')->insert([
				'title' => Str::random(30),
				'content' => Str::random(50),
				'idUser' => rand(3, 35),
				'likeViewID' => rand(10, 50)
			]);
		}

	}
}

class CommentSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;

		for ($i = 0; $i <= $limit; $i++){
			DB::table('comments')->insert([
				'content' => Str::random(50),
				'userID' => rand(1, 50),
				'newsID' => rand(1, 50)
			]);
		}
	}
}



