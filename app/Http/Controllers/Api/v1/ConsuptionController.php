<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consuption;
use App\Http\Resources\ConsuptionResource;

class ConsuptionController extends Controller
{
    //
    public function store(Request $request): ConsuptionResource
    {
        $request -> validate([
            'consuption' => 'required'
        ]);

        $units = Consuption::create($request->all());
        return new ConsuptionResource($units);
    }
}
