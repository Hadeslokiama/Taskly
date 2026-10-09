<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index(): string
    {
        return view('pages/profile', [
            'title' => 'Profile',
            'user' => (new UserModel())->first(),
        ]);
    }
}
