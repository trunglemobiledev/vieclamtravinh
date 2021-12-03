<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\NganhNghe;
use App\Services\QueryService;
use Exception;


class NganhNgheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        try {
			$limit = $request->get('limit', 25);
			$ascending = (int)$request->get('ascending', 0);
			$orderBy = $request->get('orderBy', '');
			$search = $request->get('search', '');
			$betweenDate = $request->get('updated_at', []);

			$queryService = new QueryService(new NganhNghe);
            $queryService->select = [];
            $queryService->columnSearch = [];
            $queryService->withRelationship = [];
            $queryService->search = $search;
            $queryService->betweenDate = $betweenDate;
            $queryService->limit = $limit;
            $queryService->ascending = $ascending;
            $queryService->orderBy = $orderBy;

            $query = $queryService->queryTable();
            $query = $query->paginate($limit);
            $nganhNghe = $query->toArray();

			return $this->jsonTable($nganhNghe);
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
		    $item = new NganhNghe();
            // dd($request);
		    $item->fill($request->all());
            $item->save();
			return $this->jsonData($item, Response::HTTP_CREATED);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NganhNghe  $nganhNghe
     * @return \Illuminate\Http\Response
     */
    public function show(NganhNghe $nganhNghe)
    {
        try {
            return $this->jsonData($nganhNghe);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NganhNghe  $nganhNghe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NganhNghe $nganhNghe)
    {
        try {
		    $nganhNghe->fill($request->all());
            $nganhNghe->save();
            //{{CONTROLLER_RELATIONSHIP_MTM_UPDATE_NOT_DELETE_THIS_LINE}}

			return $this->jsonData($nganhNghe);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NganhNghe  $nganhNghe
     * @return \Illuminate\Http\Response
     */
    public function destroy(NganhNghe $nganhNghe)
    {
        try {
			$nganhNghe->delete();
		    return $this->jsonMessage("Xóa bài thành công");
	    } catch (\Exception $e) {
	    	return $this->jsonError($e);
	    }
    }

    /**
     * get all data from NganhNghe
     * @return JsonResponse
     */
    public function getNganhNghe()
    {
        try {
            $posts = Post::all();
            return $this->jsonData($posts);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
