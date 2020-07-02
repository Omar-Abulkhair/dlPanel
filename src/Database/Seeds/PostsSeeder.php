<?php
namespace Dl\Panel\Database\Seeds;
use DB;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'author_id'=>'1',
            'category_id'=>'1',
            'title'=>'test title',
            'body'=>'<p>test title</p>',
            'seo_title'=>'test Seo title',
            'excerpt'=>'test excerpt',
            'slug'=>'test',
            'meta_description'=>'meta_description',
            'meta_keywords'=>'meta_keywords',
            'status'=>'pending',
            'featured'=>0,
            'image'=>null,
            'created_at'=>"2020-05-19 13:13:00",
            'updated'=>"2020-05-19 13:13:00"
        ]);
    }
}
