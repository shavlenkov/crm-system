<?php

namespace App\Services\Web;

use App\Models\User;

class UserService
{
    /**
     * Method that returns all users
     *
     * @return mixed
     */
    public function getAll(): mixed {
       return User::simplePaginate(config('app.paginate'));
    }
}
