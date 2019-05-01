<?php

namespace App\Observers;

use App\Content;
use Illuminate\Support\Str;

class ContentObserver
{
    public function saving(Content $content)
    {
       // $content->slug = str_slug($content->title);
        $content->slug = Str::slug($content->title);
    }
    /**
     * Handle the content "created" event.
     *
     * @param  \App\Content  $content
     * @return void
     */
    public function created(Content $content)
    {
        $content->slug = Str::slug($content->title);
    }

    /**
     * Handle the content "updated" event.
     *
     * @param  \App\Content  $content
     * @return void
     */
    public function updated(Content $content)
    {
        $content->slug = Str::slug($content->title);
    }

    /**
     * Handle the content "deleted" event.
     *
     * @param  \App\Content  $content
     * @return void
     */
    public function deleted(Content $content)
    {
        //
    }

    /**
     * Handle the content "restored" event.
     *
     * @param  \App\Content  $content
     * @return void
     */
    public function restored(Content $content)
    {
        //
    }

    /**
     * Handle the content "force deleted" event.
     *
     * @param  \App\Content  $content
     * @return void
     */
    public function forceDeleted(Content $content)
    {
        //
    }
}
