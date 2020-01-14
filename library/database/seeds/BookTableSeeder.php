<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $book_info_param = [
            'source_id' => 1,
            'title' => 'PHPフレームワークLaravel入門',
            'isbn13' => 9784798052588,
            'publisher_id' => '1',
            'published_date' => '2017-09-15',
            'thumbnail' => 'http://books.google.com/books/content?id=Pw5NDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
        ];
        DB::table('books_information')->insert($book_info_param);

        $author_param = [
            'author_name' => '掌田津耶乃',
        ];
        DB::table('author')->insert($author_param);

        $publisher_param = [
            'publisher_name' => '秀和システム',
        ];
        DB::table('publisher')->insert($publisher_param);

        $book_author_param = [
            'book_id' => 1,
            'author_id' => 1,
        ];
        DB::table('book_author')->insert($book_author_param);
    }
}
