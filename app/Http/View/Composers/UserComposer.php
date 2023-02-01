<?php
namespace App\Http\View\Composers;

use App\Http\Controllers\MenusController;
use App\Models\Archive;
use App\Models\Daj;
use App\Models\Departement;
use App\Models\Entreprise;
use App\Models\Faculte;
use App\Models\Personnalite;
use App\Models\Prefecture;
use App\Models\Profil;
use App\Models\Universite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserComposer {

    //required method
    public function compose(View $view) {
        if(Auth::check()) {
            $user = Auth::user();
            $profils = Profil::orderBy('name')->get()->all();
            // Ressources globales
            if($user->is_super_admin){
                $sidebar = MenusController::getAdminMenus();
            }
            $view->with([
                '_user' => $user,
                '_sidebar' => $sidebar,
                '_profils' => $profils
            ]);
        }
    }
}
