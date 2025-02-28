<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensures only authenticated users can access
    }

    public function index()
    {
        $blogs = Blogs::where('user_id', Auth::id())->latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Ensure the blog is saved with the logged-in user's ID
    $blog = new Blogs();
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->user_id = Auth::id(); // Ensure user_id is set
    $blog->save();

    return redirect()->route('blogs.index')->with('success', 'Blog post created successfully!');
    }


    public function show(Blogs $blog)
    {
        $this->authorizeBlogAccess($blog);
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blogs $blog)
    {
        $this->authorizeBlogAccess($blog);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blogs $blog)
    {
        $this->authorizeBlogAccess($blog);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($request->only(['title', 'content']));

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blogs $blog)
    {
        $this->authorizeBlogAccess($blog);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully!');
    }

    private function authorizeBlogAccess(Blogs $blog)
    {
        if ($blog->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
