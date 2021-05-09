<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Shop;

class UpdatedSideMenuComposer
{
    public function compose(View $view){
        return $view->with('ups', $this->getUpdatedShop());
    }

    private function getUpdatedShop(){
        $shops = Shop::where('updated_at', '>=', Carbon::now()->subDays(1))->orderBy('updated_at', 'desc')->get();
        return $shops;
    }
}