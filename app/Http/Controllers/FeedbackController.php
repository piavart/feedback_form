<?php
/**
 * Created by PhpStorm.
 * User: piavart
 * Date: 2020-02-01
 * Time: 22:26
 */

namespace App\Http\Controllers;


use App\Http\Requests\CreateFeedback;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * @param CreateFeedback $request запрос прошедший валидацию
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function FeedbackCreate( CreateFeedback $request ){

        // получение авторизованного пользователя
        $user = User::find(Auth::user()->id);

        // создание обращения через отношение
        $user->feedbacks()->create([
            'title' => $request->title,
            'content' => $request->get('content'),
        ]);

        return response()->json([
            'status' => 'success'
        ],200);
    }


    public function GetFeedbacks(){
        $user = User::find(Auth::user()->id);

        // проверка на права
        if(!$user->inRole('manager')){
            return response()->json([],403);
        }
        $feedbacks = Feedback::with('user')->orderByDesc('id')->get();
        return response()->json(compact('feedbacks'),200);
    }

    public function FeedbackComplete( Request $request ){
        $user = User::find(Auth::user()->id);

        // проверка на права
        if(!$user->inRole('manager')){
            return response()->json([],403);
        }
        $feedback = Feedback::find( $request->get('id') );
        $feedback->completed = 1;
        $feedback->save();
        return response()->json([],200);
    }

}