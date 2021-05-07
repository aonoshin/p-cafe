<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Shop;

class UpdatedSideMenuComposer
{
    public function compose(View $view){
        return $view->with('shops', $this->getUpdatedShop());
    }

    private function getUpdatedShop(){
        $now = Carbon::today();
        $month = Carbon::today()->subDay(30);
        $shops = Shop::whereBetween('updated_at', [$month, $now])->orderBy('updated_at', 'desc')->get();
        return $shops;
    }
}