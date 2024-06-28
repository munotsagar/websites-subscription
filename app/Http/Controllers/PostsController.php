<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Models\Posts;
use App\Jobs\EmailPosts;
use App\Models\Subscription;

class PostsController extends Controller
{
    //
    public function create(PostsRequest $request)
    {
        $post = new Posts();
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->created_by = $request->get('created_by');
        $post->website_id = $request->get('website_id');
        if ($post->save()) {
            $response['success'] = true;
            $response['message'] = "Post added successfully.";
            $data = [
                'title' => $request->get('title'),
                'description' => $request->get('description')
            ];
            $subscriptions = Subscription::leftJoin('users', 'users.id', 'subscription.user_id')
                ->where('subscription.website_id', $request->get('website_id'))->pluck('users.email')->toArray();
            foreach ($subscriptions as $subscription) {
                $data['email'] = $subscription;
                EmailPosts::dispatch($data)->onQueue('emails');
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Something went wrong!";
        }
        return response()->json($response);
    }
}
