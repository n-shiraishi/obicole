<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_obiposts = $user->obiposts()->count();
        
        return [
            'count_obiposts' => $count_obiposts,
        ];
    }
    
    public function favcounts($obipost) {
        $count_favorite_users = $obipost->favorite_users()->count();
        $count_wishing_users = $obipost->wishing_users()->count();
        
        return [
            'count_favorite_users'  => $count_favorite_users,
            'count_wishing_users' => $count_wishing_users,
        ];
    }
}
