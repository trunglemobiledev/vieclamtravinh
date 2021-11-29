<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\QueryService;
use Illuminate\Http\Response;
use Exception;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $limit = $request->get('limit', 25);
            $ascending = (int) $request->get('ascending', 0);
            $orderBy = $request->get('orderBy', '');
            $search = $request->get('search', '');
            $betweenDate = $request->get('updated_at', []);
            $queryService = new QueryService(new Post());
            $queryService->select = [];
            $queryService->columnSearch = ['title', 'content'];
            $queryService->withRelationship = ['postType'];
            $queryService->search = $search;
            $queryService->betweenDate = $betweenDate;
            $queryService->limit = $limit;
            $queryService->ascending = $ascending;
            $queryService->orderBy = $orderBy;
            $query = $queryService->queryTable();
            $query = $query->paginate($limit);
            $post = $query->toArray();
            return $this->jsonTable($post);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
		    $post = new Post();
		    $post->fill($request->all());
            $post->save();
			return $this->jsonData($post, Response::HTTP_CREATED);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        try {
            return $this->jsonData($post);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {
		    $post->fill($request->all());
            $post->save();
            //{{CONTROLLER_RELATIONSHIP_MTM_UPDATE_NOT_DELETE_THIS_LINE}}

			return $this->jsonData($post);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
	 * delete once by id
	 * @param Size $size
	 * @return JsonResponse
	 */
    public function destroy(Post $post)
    {
        try {
			$post->delete();
		    return $this->jsonMessage("Xóa bài thành công");
	    } catch (\Exception $e) {
	    	return $this->jsonError($e);
	    }
    }

    /**
     * get all data from Size
     * @return JsonResponse
     */
    public function getPost()
    {
        try {
            $posts = Post::all();
            return $this->jsonData($posts);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
