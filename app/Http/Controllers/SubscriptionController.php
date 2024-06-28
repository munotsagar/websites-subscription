<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request)
    {
        $subscriptionRec = Subscription::where('user_id', $request->user_id)->where('website_id', $request->website_id)->count();
        if ($subscriptionRec == 0) {
            $subscription = new Subscription();
            $subscription->user_id = $request->get('user_id');
            $subscription->website_id = $request->get('website_id');
            if ($subscription->save()) {
                $response['success'] = true;
                $response['message'] = "Subscription added successfully.";
            } else {
                $response['success'] = false;
                $response['message'] = "Something went wrong!";
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Subscription already exists!";
        }
        return response()->json($response);
    }
}
