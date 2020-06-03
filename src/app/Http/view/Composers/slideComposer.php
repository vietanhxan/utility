<?php

namespace VCComponent\Laravel\Utility\Http\View\Composers;

use Illuminate\View\View;
use VCComponent\Laravel\Post\Entities\Post;

class SlideComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $perPage = 3;
        if (config('utility.slide.limit') !== "") {
            $perPage = config('utility.slide.limit');
        }

        $slides = Post::oftype('slides')->where('status', 1)->latest()->paginate($perPage);
        $view->with('slides', $slides);
    }
}
