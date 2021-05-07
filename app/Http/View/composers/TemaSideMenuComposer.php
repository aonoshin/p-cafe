<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Tema;

class TemaSideMenuComposer
{
    public function compose(View $view){
        return $view->with('temas', Tema::orderBy('created_at', 'asc')->get());
    }
}