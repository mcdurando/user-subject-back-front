<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\UserSubject;
use App\Http\Resources\UserSubjectResource;


class UserSubjectController extends BaseController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersubjects = UserSubject::all();
    
        return $this->sendResponse(UserSubjectResource::collection($usersubjects), 'User Subjects retrieved successfully.');
    }

        // Get all subjects with specific user id
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $usersubjects = UserSubject::where('user_id', $id)->get();

        $usersubjects = UserSubject::join('subjects', 'subjects.id', '=', 'user_subjects.subject_id')
              		->where('user_subjects.user_id', '=', $id)
              		->get(['user_subjects.id', 'subjects.name']);

   
        return $this->sendResponse($usersubjects, 'User subjects by user_id retrieved successfully.');
    }
}