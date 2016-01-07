<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class NavigationComposer {
    
    public function compose(view $view){
        
        $view->with('latest', \App\Article::latest()->first()); 
    }
}