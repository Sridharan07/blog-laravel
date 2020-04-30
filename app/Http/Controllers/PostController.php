<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;


class PostController extends Controller
{ 
    public function index(){
        if(request()->ajax())
        {
            if(Auth::user()->admin){
            return datatables()->of(Post::latest()->get())                     
                    ->addColumn('action', function($data){
                            $button = '<a name="edit" href="'.route('post.edit',$data->id).'" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                            <button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Delete</button>';
                            return $button;
                        })   
                    ->addColumn('title', function($data){                          
                        return '<div class="text-dark">'.$data->title.'<div>';
                    })
                    ->addColumn('picture', function($data){                          
                        $url=asset($data->picture); 
                        $image = '<img src='.$url.' class="img" width="100px">';
                        return $image;
                    })
                     ->addColumn('status', function($data){                          
                        if($data->status){
                            $status = '<h5><span class="badge badge-success">PUBLISH</span></h5>';
                            }
                            else{
                            $status = '<h5><span class="badge badge-warning">UNPUBLISH</span></h5>';
                            }
                        return $status;   
                    })
                    ->addColumn('user', function($data){                          
                        $dt = $data->user->name;
                        return $dt; 
                    })
                    ->addColumn('category', function($data){
                        return '<h5><span class="badge badge-info">'.$data->category->name_category.'</span></h5>';                       
                    })                  
                    ->addColumn('created_at', function($data){
                        return $data->created_at->format('d M Y');                       
                    })               
                    ->rawColumns(['action','picture','category','title','user','status'])
                    ->addIndexColumn()
                    ->make(true);
                }
                else{
                    return datatables()->of(Post::where('user_id', Auth::id())->latest()->get()) 
                    ->addColumn('action', function($data){
                            $button = '<a name="edit" href="'.route('post.edit',$data->id).'" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                            <button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Delete</button>';
                            return $button;
                        })                      
                    ->addColumn('title', function($data){                          
                        return '<div class="text-dark">'.$data->title.'<div>';
                    })
                    ->addColumn('picture', function($data){                          
                        $url=asset($data->picture); 
                        $image = '<img src='.$url.' class="img" width="100px">';
                        return $image;
                    })
                     ->addColumn('status', function($data){                          
                        if($data->status){
                            $status = '<h5><span class="badge badge-success">PUBLISH</span></h5>';
                            }
                            else{
                            $status = '<h5><span class="badge badge-warning">UNPUBLISH</span></h5>';
                            }
                        return $status;   
                    })
                    ->addColumn('user', function($data){                          
                        $dt = $data->user->name;
                        return $dt; 
                    })
                    ->addColumn('category', function($data){
                        return '<h5><span class="badge badge-info">'.$data->category->name_category.'</span></h5>';                       
                    })                  
                    ->addColumn('created_at', function($data){
                        return $data->created_at->format('d M Y');                       
                    })               
                    ->rawColumns(['action','picture','category','title','user','status'])
                    ->addIndexColumn()
                    ->make(true);
                }
                
        }
        return view('admin.posts.index');
    }

    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if($category->count() == 0){
            return redirect()->route('category.create')->with('info','You must fill in the categories or tags first');
        }
        return view('admin.posts.create', compact('category','tags'));
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',   
            'tag' => 'required|array|min:1',
            'content' => 'required',
            'id_category' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',         
           
        ]);

        //dd($request->all());

        $picture = $request->picture;
        $slug = Str::Slug($picture->getClientOriginalName());
        $new_picture = time().$slug;
        Image::make($picture->getRealPath())->resize(1366, 768)->save('photos/shares/thumbnail/' . $new_picture);
        Image::make($picture->getRealPath())->resize(703, 467)->save('photos/shares/thumbnail/large_size/' . $new_picture);
        Image::make($picture->getRealPath())->resize(600, 400)->save('photos/shares/thumbnail/medium_size/' . $new_picture);
        Image::make($picture->getRealPath())->resize(100, 67)->save('photos/shares/thumbnail/small_size/' . $new_picture);
        

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->id_category,
            'picture' => 'photos/shares/thumbnail/'.$new_picture,
            'slug' => $request->slug,
            'user_id' => $request->user()->id,
            'large_size' => 'photos/shares/thumbnail/large_size/'.$new_picture,
            'medium_size' => 'photos/shares/thumbnail/medium_size/'.$new_picture,
            'small_size' => 'photos/shares/thumbnail/small_size/'.$new_picture,
            'status' => $request->status
        ]); 


        $post->tags()->attach($request->tag);
        
        return redirect()->route('post.index')->with('success','Posts Saved Successfully');     

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post','category','tags'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'id_category' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::find($id);

        if($request->hasFile('picture')){
            $this->unlink_image($post);

            $picture = $request->picture;
            $slug = Str::Slug($picture->getClientOriginalName());
            $new_picture = time().$slug;
            Image::make($picture->getRealPath())->resize(1366, 768)->save('photos/shares/thumbnail/' . $new_picture);
            Image::make($picture->getRealPath())->resize(703, 467)->save('photos/shares/thumbnail/large_size/' . $new_picture);
            Image::make($picture->getRealPath())->resize(600, 400)->save('photos/shares/thumbnail/medium_size/' . $new_picture);
            Image::make($picture->getRealPath())->resize(100, 67)->save('photos/shares/thumbnail/small_size/' . $new_picture);
            $post->picture = 'photos/shares/thumbnail/'.$new_picture;
            $post->large_size = 'photos/shares/thumbnail/large_size/'.$new_picture;
            $post->medium_size = 'photos/shares/thumbnail/medium_size/'.$new_picture;
            $post->small_size = 'photos/shares/thumbnail/small_size/'.$new_picture;


        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->category_id = $request->id_category;
        $post->status = $request->status;

        $post->save();
        $post->tags()->sync($request->tag);
        return redirect()->route('post.index')->with('success','Posts Updated Successfully');
    }

    private function unlink_image($post){

        if ( file_exists($post->picture) ) unlink($post->picture);
        if ( file_exists($post->large_size) ) unlink($post->large_size);
        if ( file_exists($post->medium_size) ) unlink($post->medium_size);
        if ( file_exists($post->small_size) ) unlink($post->small_size);  
    }

    public function destroy($id)
    {
        $post = Post::find($id);   
        $post->delete();

    }

    public function trashed(){
        if(request()->ajax())
        {
            return datatables()->of(Post::onlyTrashed()->latest()->get())
              
                    ->addColumn('action', function($data){
                            $button = '<a name="restore" href="'.route('post.restore',$data->id).'" class="btn btn-info btn-sm"><i class="fas fa-redo"></i> Restore</a>
                            <button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</button>';
                            return $button;
                        })
                    ->addColumn('title', function($data){                          
                        return '<div class="text-dark">'.$data->title.'<div>';
                    })
                    ->addColumn('picture', function($data){                          
                        $url=asset($data->picture); 
                        $image = '<img src='.$url.' class="img" width="100px">';
                        return $image;
                    })
                     ->addColumn('status', function($data){                          
                        if($data->status){
                            $status = '<h5><span class="badge badge-success">PUBLISH</span></h5>';
                            }
                            else{
                            $status = '<h5><span class="badge badge-warning">UNPUBLISH</span></h5>';
                            }
                        return $status;   
                    })
                    ->addColumn('user', function($data){                          
                        $dt = $data->user->name;
                        return $dt; 
                    })
                    ->addColumn('category', function($data){
                        return '<h5><span class="badge badge-info">'.$data->category->name_category.'</span></h5>';                       
                    })                  
                    ->addColumn('created_at', function($data){
                        return $data->created_at->format('d M Y');                       
                    })               
                    ->rawColumns(['action','picture','category','title','user','status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.posts.trashed');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        $this->unlink_image($post);
        return redirect()->route('post.trashed')->with('delete','Post Successfully Deleted Permanently');

    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('post.trashed')->with('success','Post Successfully at Restore');
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
