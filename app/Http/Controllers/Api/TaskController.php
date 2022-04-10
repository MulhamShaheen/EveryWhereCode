<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Task;
use Hash;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function taskList(Request $request)
    {
        if ($user = request()->user()) {
            $tasks = $user->tasks;
            if(empty($tasks)){
                return response()->json([
                    'status' => 'success',
                    'message' => 'you user does not have any tasks',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'retrieved all your tasks',
                'content' => $tasks
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'unauthorized',
        ]);

    }
    public function addTask(Request $request){
        $data = $request->all();

        $task = Task::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'done' => false,
            'user_id' => request()->user()->id,
            'board_id' => 0,
        ]);

        if($task){
            return response()->json([
                'status' => 'success',
                'message' => 'task is successfully created',
                'content' => $task,
            ]);
        }
    }
    public function viewTask(Request $request, $id){
        if($task = Task::find($id)){
            return response()->json([
                'status' => 'success',
                'message' => 'information about task num.'.$id,
                'content' => $task,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'task with id '. $id . ' is not found',
        ]);
    }

    public function deleteTask(Request $request, $id){
        if($task = Task::find($id)){
            $task->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'task num. '.$id. ' is deleted'  ,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'task with id '. $id . ' is not found',
        ]);
    }
    public function editTask(Request $request, $id){
        if($task = Task::find($id)){
            $task->title = $request->title ?? $task->title;
            $task->content = $request->content ?? $task->content;
            $task->save();
            return response()->json([
                'status' => 'success',
                'message' => 'task num. '.$id. ' is edited' ,
                'new task'=>$task
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'task with id '. $id . ' is not found',
        ]);
    }

    public function markDone(Request $request, $id ){
        if($task = Task::find($id)){
            $task->done = true;
            $task->save();
            return response()->json([
                'status' => 'success',
                'message' => 'task '.$task->title. ' is marked as done' ,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'task with id '. $id . ' is not found',
        ]);
    }
    public function markUndone(Request $request, $id ){
        if($task = Task::find($id)){
            $task->done = false;
            $task->save();
            return response()->json([
                'status' => 'success',
                'message' => 'task '.$task->title. ' is marked as undone' ,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'task with id '. $id . ' is not found',
        ]);
    }

}
