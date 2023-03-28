<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Vot;
use App\Models\tag;
use App\Models\Package;
use App\Models\jobpost;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct(){
    }
    public function about(){
        return view('pages.about');
    }

    public function adminlogin(){
        return view('admin.auth.login');
    }

    public function adminloginpost(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->user_type != "admin") {
            return redirect()->route('adminlogin');
        }
        $users = $request->only('email', 'password');
        if (Auth::attempt($users)){
            Session::flash('message', 'Login successfully');
            Session::flash('errormsg', 'success');
            return view('admin.dashboard');
        }
    }

    public function all_questions(Request $request){
        $users = User::get();
        $questions = Question::orderBy('created_at', 'DESC')->paginate(2);
        if (isset($request->tag)) {
            $questions = array();
            $tagdata = Question::orderBy('created_at', 'DESC')->get();
            foreach ($tagdata as $tagdatas) {
                if (isset($tagdatas->tag) && $tagdatas->tag != "" && in_array($request->tag, json_decode($tagdatas->tag))) {
                    $questions[] = $tagdatas;
                }
            }
        }
        return view('pages.all_questions', compact('users', 'questions'));
    }

    public function ask(){
        $tags = tag::get();
        $questions = Question::where('id')->get();
        return view('pages.ask', compact('questions', 'tags'));
    }

    public function buynow($id){
        $package = Package::find($id);
        session()->put('packageid', $id);
        return view('package.buynow', compact('package'));
    }

    public function contact(){
        return view('pages.contact');
    }

    public function dashboard(Request $request){
        $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->user_type != "admin") {
            return redirect()->route('');
        }
        return redirect()->route('adminlogin');
    }

    public function edit_user(){
        $users = User::get();
        return view('pages.edit_user', compact('users'));
    }

    public function hire(){
        $jobpost = jobpost::orderBy('created_at', 'DESC')->paginate(2);
        return view('pages.hire', compact('jobpost'));
    }

    public function index(Request $request){
        $users = User::get();
        $recent_questions = Question::orderBy('created_at', 'DESC')->paginate(2);
        if (isset($request->tag)) {
            $recent_questions = array();
            $tagdata = Question::orderBy('created_at', 'DESC')->get();
            foreach ($tagdata as $tagdatas) {
                if (isset($tagdatas->tag) && $tagdatas->tag != "" && in_array($request->tag, json_decode($tagdatas->tag))) {
                    $recent_questions[] = $tagdatas;
                }
            }
        }
        $most_answered = Question::orderBy('user_id', 'DESC')->paginate(5);
        $most_question = Question::orderBy('user_id', 'ASC')->paginate(5);
        $most_views = Question::orderBy('viewed', 'DESC')->paginate(5);
        return view('welcome', compact('users', 'recent_questions','most_answered','most_question','most_views'));
    }

    public function job_post(){
        $jobpost = jobpost::get();
        return view('pages.jobpost', compact('jobpost'));
    }

    public function logout(){
        Auth::logout();
    }

    public function myquestion(){
        $users = User::get();
        $users = Auth::user()->id;
        $questions = Question::where('user_id', $users)->get();
        return view('pages.myquestion', compact('users', 'questions'));
    }

    public function package(){
        $package = Package::all();
        return view('package.package', compact('package'));
    }

    public function perform(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function privacy_policy(){
        return view('pages.privacy_policy');
    }

    public function quedetails($id){
        $questions = Question::where('id', $id)->first();
        $questions->viewed += 1;
        $questions->save();
        $users = User::get();
        $answers = Answer::where('question_id', $id)->get();
        $comments = Comment::where('question_id', $id)->where('type', 0)->limit(3)->get();
        $vots = Vot::first();
        return view('pages.quedetails', compact('questions', 'users', 'answers', 'comments'));
    }

    public function show(){
        $data=['name'=>"hey" ,'data'=>"hello"];
        $user['to']='vinayvlk1234@gmail.com';
        Mail::send('mail.home',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Hey');
        });
        echo "<h1>Your mail has been successfully sent.</h1>";
    }

    public function tags(){
        $tags = tag::paginate(3);
        return view('pages.tags', compact('tags'));
    }

    public function tagsss($id){
        $tags = tag::where('id', $id)->get();
        return back();
    }

    public function terms_conditions(){
        return view('pages.terms_conditions');
    }

    public function userlist(){
        $users = User::where('user_type', '!=', 'admin')->get();
        return view('pages.user_list', compact('users'));
    }

    public function userloginpost(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->user_type != "user") {
            return redirect()->route('login');
        }
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                auth()->login($user, true);
                Session::flash('message', 'Login successfully');
                Session::flash('errormsg', 'success');
                // $data=['name'=>"hey" ,'data'=>"hello"];
                // $user = Auth::user()->email;
                // Mail::send('mail.login',$data,function($messages) use ($user){
                //     $messages->to($user=Auth::user()->email);
                //     $messages->subject('Hey');
                // });
                return redirect()->route('home');
            }
        }
        Session::flash('message', 'user not found');
        Session::flash('errormsg', 'error');
        return back();
    }

    public function userprofile($id){
        $users = User::where('id', $id)->get();
        $questions = Question::where('user_id', $id)->get();
        $answers = Answer::where('user_id', $id)->get();
        return view('pages.user_profile', compact('users', 'questions', 'answers'));
    }

    public function viewdetails($id){
        $package = Package::where('id', $id)->get();
        return view('package.viewdetails', compact('package'));
    }

    public function welcome(){
        if (Auth::check()) {
            return view('admin.dashboard');
        }
        return redirect("adminlogin");
    }
}
