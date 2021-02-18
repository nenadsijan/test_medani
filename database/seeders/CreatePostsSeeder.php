<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class CreatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::updateOrCreate(
          ['id' => 1],
          ['user_id'=>1,
           'title'=>'Why does nature matter',
           'slug'=>'why_does_nature_matter',
           'text'=>'Nature is our life-support system. From the fresh air we breathe to the clean water we drink, nature provides the essentials we all rely on for our survival and well-being. And it also holds the key to our prosperity, with millions of livelihoods and much of our economic activity also depending on the natural world. These immense benefits to humanity, estimated to be worth around US$125 trillion a year, are only possible if we maintain a rich diversity of wildlife.
				We know that we are losing nature faster than it can restore itself. And without urgent action, significant harm to people and planet is inevitable: inadequate food and water for our growing global population, significant harm to our economies, and the mass extinction of an estimated one million species.
				The world is no stranger to these issues, with governments already pledging action to tackle nature loss through the UN’s global agreement on nature, the Convention on Biological Diversity. But the convention’s targets for 2020, set almost a decade ago, will in all cases not be met.
				Meanwhile, the warning signs continue to mount. Populations of mammals, birds, reptiles, amphibians and fish have declined on average by 60 per cent in the past 40 years – and 75 per cent of land has been significantly altered by human activities.',
           'publish'=> true]
        );

         Post::updateOrCreate(
          ['id' => 2],
          ['user_id'=>1,
           'title'=>'Story of Plitvice Lakes',
           'slug'=>'story_of_plitvice_lakes',
           'text'=>'Plitvice Lakes – a magnificent and dynamic face of nature that is constantly transforming. Although science offers an unquestionable answer to the formation of Plitvice Lakes and travertine barriers, karst water has always had mythical features for humans.
				Thus, the legend says that after a long drought, the Black Queen took pity on the karst and dropped heavy rain on the ground, and the remaining water created lakes.
				Only life can connect stone, water, and forest in such a way. More beautiful than any description, more vivid than the best photo, more amazing than any video – just coming to Plitvice Lakes can leave the full impression of beauty that is on the list of the world’s most famous names of natural beauty.',
           'publish'=> true]
        );

         Post::updateOrCreate(
          ['id' => 3],
          ['user_id'=>2,
           'title'=>'Una Spring',
           'slug'=>'una_spring',
           'text'=>'The Una Spring is located at 395,8 meters above sea level in the part of Lika belonging to the Zadar County, under the slopes of Lička Plješivica and Stražbenica, in the vicinity of Donja Suvaja, located in the Municipality of Gračac. 
				The spring of Una is a fairy tale turquoise-coloured lake surrounded by forests and steep cliffs. With its calm surface, this lake is one of the deepest and strongest springs of this area. The first Una waterfall is located some 10 meters from the spring.
				In 2007, the lake was explored by cave divers who participated in an international expedition. An Italian cave diver named Luigi Casati reached the depth of 205 m and took photographs of this natural phenomenon. 
				Thanks to its incredible beauty and exceptional hydro-morphological value, in 1968 the lake and the canyon surrounding it, as well as 150 meters of downstream flow were named a protected hydrological monument of nature.',
           'publish'=> true]
        );
    }
}
