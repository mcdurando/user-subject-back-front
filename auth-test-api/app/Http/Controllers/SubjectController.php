<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Subject;
use App\Http\Resources\SubjectResource;


class SubjectController extends BaseController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
    
        return $this->sendResponse(SubjectResource::collection($subjects), 'Subjects retrieved successfully.');
    }
}