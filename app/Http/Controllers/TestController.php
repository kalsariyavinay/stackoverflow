<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\User;
use App\Models\Contact;
use App\Models\jobpost;
use App\Models\names;
use App\Models\works;
use App\Models\names_works;
use App\Models\Mechanic;
use App\Models\Car;
use App\Models\Owner;
use Carbon\Carbon;

class TestController extends Controller
{
   public function index()
    {

        // Set your API credentials and phone number
        $api_key = 'f1408822';
        $api_secret = '7VxQHJlx1w3dBOfW';
        $from_number = '917435830454';
        $to_number = '+919727950927'; // recipient's phone number
        $message = 'Hello my self vinay kalsariya and i have a lern to the laravel'; // message body

        // Build the Vonage API request
        $url = 'https://rest.nexmo.com/sms/json';
        $fields = array(
            'api_key' => urlencode($api_key),
            'api_secret' => urlencode($api_secret),
            'from' => urlencode($from_number),
            'to' => urlencode($to_number),
            'text' => urlencode($message)
        );

        // Build the cURL request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($fields),
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Process the API response
        $json_response = json_decode($response, true);
        if ($json_response['messages'][0]['status'] == 0) {
            echo 'SMS sent successfully';
        } else {
            echo 'SMS failed with error: '.$json_response['messages'][0]['error-text'];
        }


        //1. (one to one) [hasOne]  hasOne(Question::class)

            // $user = User::find(2)->question;
            // dd($user->toArray());


        //2. (one to many) [hasMany]  hasMany(Question::class)

            // $user = User::find(2)->questions;
            // dd($user->toArray());


        //3. (One To Many (Inverse)/Belongs To) [belongsTo]  belongsTo(User::class)

            // $jobpost = jobpost::find(2);
            // dd($jobpost->user->toArray());


        //4. (many to many) [belongsToMany]  belongsToMany(names::class,'names_works')

            // $works = works::find(1);
            // dd ($works->names->toArray());

            
        // 5. (Has One Through) [hasOneThrough]  hasOneThrough(Owner::class, Car::class)

            // $mechanic = Mechanic::find(1)->owner;
            // dd($mechanic->toArray());


        // 6. (Has Many Through) [hasManyThrough]  hasManyThrough(Owner::class, Car::class)

            // $mechanic = Mechanic::find(1)->owners;
            // dd($mechanic->toArray());
           

        // 7. (One To One (Polymorphic)) model\Image- morphTo(no class), model\names morphOne(Image::class, 'imagable')
        
            // $names = names::with('image')->find(1);
            // dd($names->toArray());
            //              OR
            // $works = works::with('image')->find(1);
            // dd($works->toArray());


        // 8. (One To Many (Polymorphic)) model\Image- morphTo(no class), model\names morphMany(Image::class, 'imagable')

            // $names = names::with('images')->find(1);
            // dd($names->toArray());
            //              OR
            // $works = works::with('images')->find(1);
            // dd($works->toArray());


        // 9. (Many To Many (Polymorphic)) model\Video- morphToMany(tag::class, 'taggable') 
        
            // $video = Video::with('tags')->find(1);
            // dd($video->toArray());
            //              OR
            // $post = Post::with('tags')->find(1);
            // dd($post->toArray());
           

        // 10. append concatenate on field is 2 in 1 (name + photo)

            // $user = User::find(2)->full_name;
            // dd($user);


        // 11. database upload photo full path

            // $user =  User::first()->rephoto;  
            //     dd($user);          
        
        




    }
}