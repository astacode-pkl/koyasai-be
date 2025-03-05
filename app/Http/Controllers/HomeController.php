<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\News;
use App\Models\Embed;
use App\Models\Client;
use App\Models\Catalog;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Catalogs;
use App\Models\Category;
use App\Models\Categories;


class HomeController extends Controller
{
    public function index()
    {
        // incoming
        // $categories = Category::count();
        // // $categoriesLastcreated = $categories ? Category::latest()->first()->created_at->diffForHumans() : 'Not created yet';

        $galleries = Gallery::count();
        $galleriesLastcreated = $galleries ? Gallery::latest()->first()->created_at->diffForHumans() : 'Not created yet';

        $news = News::count();
        $newsLastcreated = $news ? News::latest()->first()->created_at->diffForHumans() : 'Not created yet';

        $categories = Category::count();
        $categoriesLastcreated = $categories ? Category::latest()->first()->created_at->diffForHumans() : 'Not created yet';

        $catalogs = Catalog::count();
        $catalogsLastcreated = $catalogs ? Catalog::latest()->first()->created_at->diffForHumans() : 'Not created yet';

        $clients = Client::count();
        $clientsLastcreated = $clients ? Client::latest()->first()->created_at->diffForHumans() : 'Not created yet';
        
        $heroes = Hero::count();
        $heroesLastcreated = $heroes ? Hero::latest()->first()->created_at->diffForHumans() : 'Not created yet';
        
        $services = Service::count();
        $servicesLastcreated = $services ? Service::latest()->first()->created_at->diffForHumans() : 'Not created yet';
        
        $embeds = Embed::count();
        $embedsLastcreated = $embeds ? Embed::latest()->first()->created_at->diffForHumans() : 'Not created yet';
        
        return view('home', [
            'galleries' => $galleries,
            'galleriesLastcreated' => $galleriesLastcreated,

            'news' => $news,
            'newsLastcreated' => $newsLastcreated,

            'categories' => $categories,
            'categoriesLastcreated' => $categoriesLastcreated,

            'catalogs' => $catalogs,
            'catalogsLastcreated' => $catalogsLastcreated,

            'clients' => $clients,
            'clientsLastcreated' => $clientsLastcreated,

            'heroes' => $heroes,
            'heroesLastcreated' => $heroesLastcreated,
            
            'services' => $services,
            'servicesLastcreated' => $servicesLastcreated,

            'embeds' => $embeds,
            'embedsLastcreated' => $embedsLastcreated,
        ]);
    }
}
