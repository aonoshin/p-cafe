<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Shop;
use Carbon\Carbon;

class CreatedSideMenuComposer
{
    public function compose(View $view){
        return $view->with('crs', $this->getCreatedShop());
    }

    private function getCreatedShop(){
        $shops = Shop::where('created_at', '>=', Carbon::now()->subDays(30))->orderBy('created_at', 'desc')->get();
        return $shops;
    }
}