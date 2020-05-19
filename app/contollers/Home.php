<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{    
    public function __construct()
    {
        $this->model = $this->model('Home');
    }

    public function index()
    {
        $posts = $this->model->getPosts();
        $hamburguers = $this->model->getProducts(1);

        View::renderTemplate('home/index.html', [
            'carousel' => true,
            'title' => 'Açougue a 110%',
            'hamburguers' => $hamburguers,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        //
    }


    public function store($request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($table, $data, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
