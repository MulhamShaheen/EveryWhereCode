<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(array $data)
    {
        return Project::create([
            'title' => $data['title'],
            'organization' => $data['organization'],
            'director' => $data['director'],
            'description' => $data['description'],
//            'cover_picture' => time().$data['prof_picture']->getClientOriginalName(),
        ]);
    }

    public function validateNewProject(Request $request){

        $request->validate([
            'title' => 'required',
            'organization' => 'required',
            'description' => 'required',
            'cover_picture' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        $project = $this->create($data);

        $project->save();

        $user = Auth::user();
        $project->users()->save($user);

//        dd($project);
//        dd(Auth::user()->projects()->get()->last());
        return redirect('account');
    }
}
