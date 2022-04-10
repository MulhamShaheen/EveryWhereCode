<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Task;
use App\Models\Board;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function createBoard(Request $request){
        $data = $request->all();
        $board = Board::create([
            'title' => $data['title'],
            'user_id' => request()->user()->id,

        ]);
        if($board){
            return response()->json([
                'status' => 'success',
                'message' => 'board is successfully created',
                'content' => $board,
            ]);
        }
    }

    public function boardList(Request $request){

        if ($user = request()->user()) {
            $board = $user->boards;
            if(empty($board)){
                return response()->json([
                    'status' => 'success',
                    'message' => 'the user does not have any boards',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'retrieved all your boards',
                'content' => $board,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'unauthorized',
        ]);
    }

    public function viewBoard(Request $request, $id){
        $user = request()->user();

        if($board = Board::find($id)){
            if(!$user->tokenCan('board-'.$id)){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'user does not have access to this board',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'information about board num.'.$id,
                'content' => $board,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }

    public function deleteBoard(Request $request, $id){

        if($board = Board::find($id)){
            $user = request()->user();
            if(!($user->tokenCan('board-'.$id) ||
                $user->id == $board->user->id)){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'user does not have access to this board',
                ]);
            }
            $board->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'board num. '.$id. ' is deleted'  ,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);

    }

    public function tasksOfBoard(Request $request, $id){
        $user = request()->user();
        if($board = Board::find($id)){
            if(!($user->tokenCan('board-'.$id) ||
                $user->id == $board->user->id)){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'user does not have access to this board',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'tasks inside board '.$board->title,
                'content' => $board->tasks,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }

    public function addTasksToBoard(Request $request, $id){
        $user = request()->user();
        if($board = Board::find($id)){
            if(!($user->tokenCan('board-'.$id) ||
                $user->id == $board->user->id)){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'user does not have access to this board',
                ]);
            }
            $data = $request->all();

            if($task = Task::find($data['id'])){
                $task->board_id = $id;
                $task->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'task '.$task->title.' added to the board '.$board->title,
                    'content' => $board->tasks,
                ]);
            }

            return response()->json([
                'status' => 'failure',
                'message' => 'task with id '. $data['id']. ' is not found',
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }

    public function giveAccessToUser(Request $request, $id){
        $user = request()->user();

        if($board = Board::find($id)){
            if(!$user->id == $board->user->id){
                    return response()->json([
                        'status' => 'failure',
                        'message' => 'user does not have access to this board',
                    ]);
                }
            $data = $request->all();

            if($user = User::find($data['id'])){

                $access = Access::create([
                    'user_id'=>$data['id'],
                    'board_id'=>$board->id,
                    'action'=>$data['access'],
                    ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'access for user '.$user->username.' granted for '.$board->title,
                ]);
            }

            return response()->json([
                'status' => 'failure',
                'message' => 'user with id '. $data['id']. ' is not found',
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }
    public function takeAccessFromUser(Request $request, $id){
        $user = request()->user();

        if($board = Board::find($id)){
            if(!$user->id == $board->user->id){
                    return response()->json([
                        'status' => 'failure',
                        'message' => 'user does not have access to this board',
                    ]);
                }
            $data = $request->all();

            if($user = User::find($data['id'])){

                $access = Access::where([
                    ['user_id' , '=', $data['id']],
                    ['board_id' , '=',$id]
                ]);
                $access->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => 'access from user '.$user->username.' has been taken for '.$board->title,
                ]);
            }

            return response()->json([
                'status' => 'failure',
                'message' => 'user with id '. $data['id']. ' is not found',
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }

    public function getAccessForBoard(Request $request, $id){
        $user = request()->user();

        if($board = Board::find($id)){
            if(!$user->id == $board->user->id){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'user does not have access to this board',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'all accesses for board '.$board->title ,
                'content' => $board->accesses ,
            ]);
        }
        return response()->json([
            'status' => 'failure',
            'message' => 'board with id '. $id . ' is not found',
        ]);
    }

}
