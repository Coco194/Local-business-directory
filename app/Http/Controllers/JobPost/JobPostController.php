<?php

namespace App\Http\Controllers\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\image;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobPostController extends Controller
{
    public function index(Request $request)
    {
        $jobPosts = JobPost::query();
    
        // Check if a category filter is applied
        if ($request->has('category')) {
            $categoryName = $request->input('category');
            $jobPosts = $jobPosts->whereHas('category', function ($query) use ($categoryName) {
                $query->where('category_name', $categoryName);
            });
        }

        // Check if a location filter is applied
        if ($request->has('location')) {
            $locationName = $request->input('location');
            $jobPosts = $jobPosts->where('location', $locationName);
        }
    
        // Load related images and paginate the results
        $jobPosts = $jobPosts->with(['images', 'category'])->paginate();
    
        return response()->json(['jobPosts' => $jobPosts]);
    }
    
    public function showJobPost($id)
    {
        $jobPost = JobPost::with(['images', 'category'])->find($id);
        return response()->json(['jobPost' => $jobPost]);
    }
    public function createJobPost(Request $request)
    {
        $this->validate($request, [
            'job_title' => 'required',
            'category_id' => 'required',
            'job_description' => 'required|min:50',
            'contact' => 'required',
            'location' => 'required',
            'images.*' => 'required|file'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $jobPost = JobPost::create(['user_id' => Auth::id()] + $request->all());

                foreach ($request->file('images') as $key => $file) {
                    $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('uploads', $fileName, 'public');
                    image::create(['job_post_id' => $jobPost->job_post_id, 'file_path' => $filePath]);
                }
            });
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to create Job post'], 500);
        }
        return response()->json(['message' => 'Job post created successfully'], 200);
    }

    public function postComment(Request $request){
        $this->validate($request, [
            'job_post_id' => 'required',
            'comment' => 'required'
        ]);
        try {
            Comment::create(['user_id' => Auth::id()] + $request->all());
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
        return response()->json(['comments' => 'Comment posted successfully'], 200);
    }

    public function comments($id){
        $comments = Comment::where('job_post_id', $id)->with('user')->orderBy('created_at', 'DESC')->get();
        return response()->json(['comments' => $comments], 200);
    }
}
