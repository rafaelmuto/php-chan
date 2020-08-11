<?php


namespace App\Repositories;


use App\Post;

class PostRepository extends AbstractRepository
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return $this->model->create($data);
    }
}
