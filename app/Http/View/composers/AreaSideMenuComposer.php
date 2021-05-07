<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Area;

class AreaSideMenuComposer
{
    public function compose(view $view){
        return $view->with('areas', Area::orderBy('created_at', 'asc')->get());
    }
}