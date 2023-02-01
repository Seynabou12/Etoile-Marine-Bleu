<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{

    static function getAdminMenus()
    {
        
        $sidebar = [

            "principals" =>
            [
                [
                    "name" => __('dashboard.tableau_de_bord'),
                    "fa" => "fa-tachometer-alt",
                    "route" => "admin.dashboard",
                ]
            ],
            "secondaires" =>
            [
                [
                    "name" => __('Candidats'),
                    "fa" => "fa-users",
                    "route" => "admin.candidats.index"
                ],
                [
                    "name" => __('Formations'),
                    "fa" => "fa-university",
                    "refs" => ['formations'],

                    "items" => [
                        [
                            "name" => __('Liste'),
                            "route" => "admin.formations.index"
                        ],
                        [
                            "name" => __('Sessions'),
                            "route" => "admin.sessions.index"
                        ],
                        [
                            "name" => __('Certifications'),
                            "route" => "admin.inscriptions.index"
                        ]
                    ],
                ],
                [
                    "name" => __('Sessions'),
                    "fa" => "fa-file",

                    "refs" => ['sessions','en-attente','en-cours','termines'],


                    "items" => [
                        [
                            "name" => __('En Attente'),
                            "route" => "admin.sessions.enAttente"
                        ],
                        [
                            "name" => __('En Cours'),
                            "route" => "admin.sessions.enCours"
                        ],
                        [
                            "name" => __('Terminés'),
                            "route" => "admin.sessions.termines"
                        ]

                    ],
                ],
                [
                    "name" => __('dashboard.configurations'),
                    "fa" => "fa-cogs",

                    "refs" => ['entreprises', 'frais','sessions'],


                    "items" => [
                        [
                            "name" => __('Entreprises'),
                            "route" => "admin.entreprises.index"
                        ],
                        [
                            "name" => __("Frais d'inscription"),
                            "route" => "admin.frais.index"
                        ],
                        // [
                        //     "name" => __('Sessions'),
                        //     "route" => "admin.sessions.index"
                        // ]

                    ],
                ],
            
                [
                    "name" => __('dashboard.utilisateurs'),
                    "fa" => "fa-users",
                    "route" => "admin.users.index"
                ],
            ],
        ];

        return json_decode(json_encode($sidebar));
    }
}
