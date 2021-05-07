<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Shop;
use Carbon\Carbon;

class CreatedSideMenuComposer
{
    public function compose(View $view){
        return $view->with('shops', $this->getCreatedShop());
    }

    private function getCreatedShop(){
        $now = Carbon::today();
        $month = Carbon::today()->subDay(30);
        $shops = Shop::whereBetween('created_at', [$month, $now])->orderBy('created_at', 'desc')->get();
        return $shops;
    }
}