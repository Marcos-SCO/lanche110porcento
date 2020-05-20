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
        $pizzas = $this->model->getProducts(2);

        $carousel = true;
        View::render('home/index.php', [
            'carousel' => $carousel,
            'title' => 'Açougue a 110%',
            'hamburguers' => $hamburguers,
            'pizzas' => $pizzas,
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
