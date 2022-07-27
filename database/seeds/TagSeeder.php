<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['italy', 'foreign', 'Js', 'OOP','Vue', 'cats','dogs','opEd','self-improvement','life-advice'];

        foreach( $tags as $tag){
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
