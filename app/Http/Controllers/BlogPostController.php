<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

 class BlogPostController extends Controller
    {
        public function blog_post_list()
        {
            $posts = BlogPost::latest()->paginate(10); 
            return view('frontend_user.blog.list_blog_post', compact('posts'));
        }

        public function create_blog_post(){
           
            return view('frontend_user.blog.create_blog_post');

        }
    
        //For Storing the blog post

        public function store(Request $request)
        {
            // Validate input
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size limit as needed
            ]);
        
            // Create new post instance
            $post = new BlogPost();
            $post->title = $request->title;
            $post->content = $request->content;
            
            if ($request->hasFile('image')) {
                // Handle file upload
                $imagePath = $request->file('image')->store('images');
                $post->image = $imagePath;
            }
        
            $post->save();
        
            return redirect()->back()->with('success', 'Blog post created successfully!');
        }
        
    // public function show(BlogPost $blogPost)
    // {
    //     return $blogPost;
    // }

//For Editing the blog post
    public function edit($id)
{
    $post = BlogPost::findOrFail($id);
    return view('frontend_user.blog.edit_blog_post', compact('post'));
}
//For Updating the blog post
public function update(Request $request, $id)
{
    $post = BlogPost::findOrFail($id);
    
    // Validate input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size limit as needed
    ]);

    // Update post
    $post->title = $request->title;
    $post->content = $request->content;
    
    if ($request->hasFile('image')) {
        // Handle file upload
        $imagePath = $request->file('image')->store('images');
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('frontend_user.blog.list_blog_post', $post->id)->with('success', 'Blog post updated successfully!');
}

    // public function destroy(BlogPost $blogPost)
    // {
    //     $blogPost->delete();
    //     return response()->json(null, 204);
    // }
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->back()->with('success', 'Blog post deleted successfully.');
    }
}
