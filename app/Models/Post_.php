<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => " Deni Ruhyadi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste illum laboriosam, facilis libero eligendi rem dolor atque vitae labore ullam soluta, debitis inventore quaerat numquam, quasi dolorem facere. Tempora, facilis quod hic illum, excepturi cupiditate ea necessitatibus assumenda tenetur dolorem temporibus dolore aut eos voluptas eaque vel! Unde repudiandae dolores et obcaecati ex ipsum aut ab exercitationem, dolorum possimus debitis consectetur consequatur minus nisi reprehenderit beatae maxime nam. Quod neque, minus ab reiciendis commodi soluta at ut aliquid vitae ex."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => " Anggita Jumena",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem expedita earum iusto deleniti id obcaecati dolores voluptate maiores, neque voluptates nihil temporibus rem vero optio? Alias suscipit sed nulla nobis, tempore fugit dicta accusantium. Sequi temporibus corporis delectus soluta ea minus, illum consequatur officia ad eligendi, aut qui autem ducimus ratione eos rem eaque provident inventore eum beatae? Quia, architecto at officia quas quidem, placeat deleniti numquam expedita dolore delectus cum eveniet voluptate id explicabo non voluptas itaque nostrum. Velit, aliquid, nulla est eum possimus mollitia delectus voluptas iure temporibus consequuntur doloremque quam porro magnam debitis laborum incidunt aspernatur quae!"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
