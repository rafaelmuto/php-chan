<?php


namespace App\Repositories;


use App\Post;

class PostRepository extends AbstractRepository
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $data['password'] = bcrypt($data['password']);

//        dd($data);

        return $this->model->create($data);
    }
}
