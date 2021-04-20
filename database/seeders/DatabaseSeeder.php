<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        	NewsSeeder::class,
        	CommentSeeder::class
        ]);
    }
}



class UserSeeder extends Seeder
{
	public function run()
	{
		$now = Carbon::now();
		$faker = Factory::create('vi_VN');
		$limit = 50;
		DB::table('users')->insert([
			'username' => 'supperadmin',
			'password' => '123',
			'email' => 'supperadmin@gmail.com',
			'nickname' => 'Ông Trùm',
			'sdt' => '0924008990',
			'fb' => 'https://facebook.com/trunghoang732kt',
			'exp' => 100,
			'level' => 5,
			'created_at' => $now,
			'updated_at' => $now
		]);
		for ($i = 0; $i <= $limit; $i++) {
			DB::table('users')->insert([
				'username' => 'user' . $i,
				'password' => 'abc123',
				'email' => $faker->email,
				'nickname' => $faker->name,
				'sdt' => $faker->phoneNumber,
				'fb' => '',
				'exp' => rand(1, 99),
				'level' => 0,
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}
}

class SlideSeeder extends Seeder
{
	public function run()
	{
		$now = Carbon::now();
		DB::table('sliders')->insert([
			['url' => 'https://via.placeholder.com/700x300'],
			['url' => 'https://via.placeholder.com/700x300'],
			['url' => 'https://via.placeholder.com/700x300'],
			['created_at' => $now],
			['updated_at' => $now]
		]);
	}
}

class TypeOfNewSeeder extends Seeder
{
	public function run()
	{
		$now = Carbon::now();
		DB::table('type_of_news')->insert([
			['type' => 'Thông báo'],
			['type' => 'Góp ý'],
			['created_at' => $now],
			['updated_at' => $now]
		]);
	}
}

class MessageSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		$now = Carbon::now();
		$faker = Factory::create('vi_VN');

		for ($i = 0; $i <= $limit; $i++){
			DB::table('messages')->insert([
				'title' => $faker->realText(30, 2),
				'content' => $faker->realText(200, 2),
				'time' => $now,
				'sender' => $faker->name,
				'receiver' => $faker->name,
				'typeOfNewId' => rand(1, 2),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}
}

class ServerGameSeeder extends Seeder
{
	public function run()
	{
		$now = Carbon::now();
		DB::table('server_games')->insert([
			'servername' => "Ngọc Hổ",
			'created_at' => $now,
			'updated_at' => $now
		]);
		DB::table('server_games')->insert([
			'servername' => "Phi Hổ",
			'created_at' => $now,
			'updated_at' => $now
		]);
		DB::table('server_games')->insert([
			'servername' => "Phi Long",
			'created_at' => $now,
			'updated_at' => $now
		]);
	}
}

class LikeViewSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		$now = Carbon::now();

		for ($i = 0; $i <= $limit; $i++){
			DB::table('like_views')->insert([
				'likeCount' => rand(10, 200),
				'viewCount' => rand(100, 500),
				'dislikeCount' => rand(5, 100),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}
}

class ProductSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		$now = Carbon::now();
		$faker = Factory::create('vi_VN');

		for ($i = 0; $i <= $limit; $i++){
			DB::table('products')->insert([
				'thumbnail' => "https://2img.net/h/3.bp.blogspot.com/-ZBs7wwti4Ok/VaTdzuu5ISI/AAAAAAAAAnk/ULSjIru1he4/s640/vltk-2-offline-viet-hoa.jpg",
				'title' => $faker->realText(50, 2),
				'content' => $faker->realText(100, 2),
				'priceType' => 'vang',
				'price' => rand(100,9999),
				'serverID' => rand(1,3),
				'likeViewID' => rand(1,50),
				'userID' => rand(1, 50),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}
}



class NewsSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		$now = Carbon::now();
		$faker = Factory::create('vi_VN');

		for ($i = 0; $i <= $limit; $i++){
			DB::table('news')->insert([
				'title' => $faker->realText(50, 1),
				'content' => $faker->realText(100, 2),
				'idUser' => rand(3, 40),
				'likeViewID' => rand(10, 50),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}

	}
}

class CommentSeeder extends Seeder
{
	public function run()
	{
		$limit = 50;
		$now = Carbon::now();
		$faker = Factory::create('vi_VN');

		for ($i = 0; $i <= $limit; $i++){
			DB::table('comments')->insert([
				'content' => $faker->realText(20),
				'time' => $now,
				'userID' => rand(1, 50),
				'newsID' => rand(1, 50),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}
}



