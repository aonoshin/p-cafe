<?php

namespace App\Http\View\Composers;

use Carbon\Carbon;
use Illuminate\View\View;

class HeaderBgComposer
{
    const MON_BG = 0;
    const TUE_BG = 1;
    const WED_BG = 2;
    const THU_BG = 3;
    const FRY_BG = 4;
    const SAT_BG = 5;
    const SUN_BG = 6;
    const DEF_BG = 7;

    public function compose(View $view){
        $headerBgsList = config('headerBg.headerBgs');
        return $view->with('headerBgs', $this->getHeaderBgs($headerBgsList));
    }

    private function getHeaderBgs($headerBgsList){
        $week = Carbon::today()->format('D');
        if($week === 'Mon'){
            $headerBgsListId = array_values($headerBgsList)[self::MON_BG];
        }elseif($week === 'Tue'){
            $headerBgsListId = array_values($headerBgsList)[self::TUE_BG];
        }elseif($week === 'Wed'){
            $headerBgsListId = array_values($headerBgsList)[self::WED_BG];
        }elseif($week === 'Thu'){
            $headerBgsListId = array_values($headerBgsList)[self::THU_BG];
        }elseif($week === 'Fry'){
            $headerBgsListId = array_values($headerBgsList)[self::FRY_BG];
        }elseif($week === 'Sat'){
            $headerBgsListId = array_values($headerBgsList)[self::SAT_BG];
        }elseif($week === 'Sun'){
            $headerBgsListId = array_values($headerBgsList)[self::SUN_BG];
        }else{
            $headerBgsListId = array_values($headerBgsList)[self::DEF_BG];
        }
        return $headerBgsListId;
    }
}