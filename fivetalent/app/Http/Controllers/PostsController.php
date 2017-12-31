<?php

// use php artisan make:controller PostsController --resource       to automatically make all of the functions for crud
// this will be eusing eliquent syntax, it is relatively new to me, I love it because it is so clean

namespace App\Http\Controllers;

// bring in post model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class PostsController extends Controller
{


    // auth function for determining who has access
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
















    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // return Post::all();  this is getting all of the sql data and putting it into an array
        // limit each page to 10 entries using pagination
        // order by desc created time
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts/index')->with('posts', $posts);
    }

    
    
    
    
    
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load up a view
        return view('posts/create');
    }

    
    
    
    
    
    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        // a list of rules that the input info must be validated through, the request is the data being validated
        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'mls' => 'required',
            'street_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'sales_price' => 'required',
            'bedroom_number' => 'required',
            'bath_number' => 'required',
            'squarefeet' => 'required',
            'street_2' => 'required',
            'neighbourhood' => 'required',
            'date_listed' => 'required',

            // most apache servers throw an error if an image is greater than or equal to 2mb so we are limiting that
            // we also want the user to have the option to not upload an image so i am using nullable
            'cover_image' => 'image|nullable|max:1999',

        ]);






        // Handle file upload
        // this is how I was shown to do it, this part is still confusing for me

        if($request->hasFile('cover_image')){

            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            // this concats the time stamp into the name so the name will always be unique
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            // upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);



        }else{


            $fileNameToStore = 'noimage.jpg';



        }









        // return 123;    just verifying the info is being validated and returning 123

        // store into the database
        // create new post
        $post = new Post;

        // input what was sent via POST to the database
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->mls = $request->input('mls');
        $post->street_1 = $request->input('street_1');
        $post->street_2 = $request->input('street_2');
        $post->city = $request->input('city');
        $post->state = $request->input('state');
        $post->zipcode = $request->input('zipcode');
        $post->neighbourhood = $request->input('neighbourhood');
        $post->sales_price = $request->input('sales_price');
        $post->date_listed = $request->input('date_listed');
        $post->bedroom_number = $request->input('bedroom_number');
        $post->bath_number = $request->input('bath_number');
        $post->squarefeet = $request->input('squarefeet');

        // get the current user-id's house listings
        $post->user_id = auth()->user()->id;

        //Cover image
        $post->cover_image = $fileNameToStore;


        // Save it in the database
        $post->save();

        // redirect to the posts view with success message
        return redirect('/posts')->with('success', 'Listing Created');
    }

    
    
    
    
    
    
    
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Post::find($id);   This will find the unique id and display all materials associated in an array

        // put info into a variable to parse out later in the view from an array
        $post = Post::find($id);
        return view('posts/show')->with('post', $post);
    }

    
    
    
    
    
    
    
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);


        // checking for the correct user to be able to edit

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not the author!');
        }


        return view('posts/edit')->with('post', $post);

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


        // a list of rules that the input info must be validated through, the request is the data being validated
        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'mls' => 'required',
            'street_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'sales_price' => 'required',
            'bedroom_number' => 'required',
            'bath_number' => 'required',
            'squarefeet' => 'required',
            'street_2' => 'required',
            'neighbourhood' => 'required',
            'date_listed' => 'required',

        ]);







        // Handle file upload
        // this is how I was shown to do it, this part is still confusing for me

        if($request->hasFile('cover_image')){

            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            // this concats the time stamp into the name so the name will always be unique
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            // upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);



        }








        // return 123;    just verifying the info is being validated and returning 123

        // store into the database

        $post = Post::find($id);

        // input what was sent via POST to the database
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->mls = $request->input('mls');
        $post->street_1 = $request->input('street_1');
        $post->street_2 = $request->input('street_2');
        $post->city = $request->input('city');
        $post->state = $request->input('state');
        $post->zipcode = $request->input('zipcode');
        $post->neighbourhood = $request->input('neighbourhood');
        $post->sales_price = $request->input('sales_price');
        $post->date_listed = $request->input('date_listed');
        $post->bedroom_number = $request->input('bedroom_number');
        $post->bath_number = $request->input('bath_number');
        $post->squarefeet = $request->input('squarefeet');




        if($request->hasFile('cover_image')){

            $post->cover_image = $fileNameToStore;



        }


        // Save it in the database
        $post->save();

        // redirect to the posts view with success message
        return redirect('/posts')->with('success', 'Listing Updated');


    }

    
    
    
    
    
    
    
    
    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);




        // checking for the correct user to be able to edit

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not the author!');
        }


        // is the cover photo is not equal to noimage,jpg then we want to delete the image
        if($post->cover_image != 'noimage.jpg'){

            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);

        }





        $post->delete();

        return redirect('/posts')->with('success', 'Listing Deleted');
    }
}
