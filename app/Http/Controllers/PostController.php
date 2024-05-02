<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::beginTransaction();
        try{

            $posts = Post::all();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $posts
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try{
            $post = Post::find($id);
            if(!$post){
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ]);
            }
            $post->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Post deleted successfully'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
