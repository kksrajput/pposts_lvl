<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\p_genre;
use App\p_faq;
use App\p_teamFaq;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $posts = Post::all();
       // $posts=  Post::orderBy('title','desc')->get();
        //$posts=  Post::orderBy('title','desc')->take(1)->get();
        //$posts=  Post::where('title','Post two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        $posts=  Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $p_faqs = p_faq::where('faq_type', 'faq_photeam_creation')->get();
        // return $p_faqs;

        $p_genre = p_genre::all();
        return view('posts.create')->with('p_genre',$p_genre)->with('p_faqs',$p_faqs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        // $this->validate($request, [
        //     'event_location'=>'required',
        //     'rqst_desc'=>'required',
        //     'rqst_expectation'=>'required',
        // ]);
        
        // //create posts
        // $post=new Post;
        // $post->event_location=$request->input('event_location');
        // $post->rqst_desc=$request->input('rqst_desc');
        // $post->rqst_expectation=$request->input('rqst_expectation');
        // //$post->user_id=auth()->user()->id;
        // $post->toppings=request('toppings');
        // $post->budget=request('budget');
        // $post->event_date=request('event_date');
        // $post->event_date_timeline=request('event_date_timeline');
        // $post->save();
        // return redirect('posts')->with('success','Post Created');
        //questions
        //$answ=new p_teamFaq();
        $p_faqs = p_faq::where('faq_type', 'faq_photeam_creation')->get();
        // foreach($p_faqs as $a)
        // {
        // $answ->answer=request('answer');
        // $answ->faq_id=request('faq_id');
        
        // }
    // p_teamFaq::create($req->all());

        // foreach($req->answer as $item => $v)
        // {
        //     $arraydata = array(
        //     'answer' => $req->answer[$item],
        //     'faq_id' => $req->faq_id[$item]
        //     );
        //     // $answ->save();
        //     p_teamFaq::insert($arraydata);

        // }
        $answ=$req->answer;
        $g=$req->faq_id;

        foreach ($answ as $key => $device_value) {
            p_teamFaq::create([
                'answer' => $device_value,
                'faq_id' => $g[$key]
            ]);}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $post = Post::find($id); 
          return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post= Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'event_location'=>'required',
            'rqst_desc'=>'required',
            'rqst_expectation'=>'required',
        ]);
        //create posts
        $post=Post::find($id);
        $post->event_location=$request->input('event_location');
        $post->rqst_desc=$request->input('rqst_desc');
        $post->rqst_expectation=$request->input('rqst_expectation');
        $post->budget=request('budget');
        $post->event_date=request('event_date');
        $post->event_date_timeline=request('event_date_timeline');
        
        $post->save();
        //create qs;
        //$p_genre = p_genre::all();
        return redirect('posts')->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts=Post::find($id);
        $posts->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
