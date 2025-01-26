<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\CreateRequest;
use Illuminate\Http\Request;

class CreateArticleController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();


    }
}
