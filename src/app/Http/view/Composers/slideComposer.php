<?php

namespace VCComponent\Laravel\Utility\Http\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use VCComponent\Laravel\Post\Entities\Post;

class SlideComposer
{
    protected $cache        = false;
    protected $cacheMinutes = 60;
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $slides = $this->slides();

        $view->with('slides', $slides);
    }

    public function slides()
    {
        $value = 3;
        if (config('utility.slide.limit') !== "") {
            $value = (int) config('utility.slide.limit');
        }

        if (config('utility.cache.enabled') === true) {
            $timeCache = config('post.cache')['minutes'] ? config('post.cache')['minutes'] * 60 : $this->cacheMinutes * 60;
            if (Cache::has('utilitySlides') && Cache::get('utilitySlides') !== "") {
                return Cache::get('utilitySlides');
            }

            return Cache::remember('utilitySlides', $timeCache, function () use ($value) {
                return Post::select('slug', 'thumbnail')->where('type', 'slides')->where('status', 1)->orderBy('id', 'desc')->limit($value)->get();
            });
        }

        return Post::select('slug', 'thumbnail')->where('type', 'slides')->where('status', 1)->orderBy('id', 'desc')->limit($value)->get();
    }
}
