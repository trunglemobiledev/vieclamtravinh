<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\QueryService;
use App\Models\BaiDangTuyen;
use Illuminate\Http\JsonResponse;
use Exception;

class BaiDangTuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
			$limit = $request->get('limit', 25);
			$ascending = (int)$request->get('ascending', 0);
			$orderBy = $request->get('orderBy', '');
			$search = $request->get('search', '');
			$betweenDate = $request->get('updated_at', []);

			$queryService = new QueryService(new BaiDangTuyen);
            $queryService->select = ['idNganhNghe','tieuDe','hinhAnh','hide','maxTuoi','minTuoi','diaChi','idLoaiCongViec'];
            $queryService->columnSearch = ['tieuDe','noidung'];
            $queryService->withRelationship = ['nganhNghes','loaiCongViecs'];
            $queryService->search = $search;
            $queryService->betweenDate = $betweenDate;
            $queryService->limit = $limit;
            $queryService->ascending = $ascending;
            $queryService->orderBy = $orderBy;

            $query = $queryService->queryTable();
            $query = $query->paginate($limit);
            $baiDang = $query->toArray();

			return $this->jsonTable($baiDang);
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
		    $item = new BaiDangTuyen();
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
     * @param  \App\Models\BaiDangTuyen  $baiDang
     * @return \Illuminate\Http\Response
     */
    public function show(BaiDangTuyen $baiDangTuyen)
    {
        try {
            return $this->jsonData($baiDangTuyen);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaiDangTuyen $baiDangTuyen)
    {
        try {
		    $baiDangTuyen->fill($request->all());
            $baiDangTuyen->save();
            //{{CONTROLLER_RELATIONSHIP_MTM_UPDATE_NOT_DELETE_THIS_LINE}}

			return $this->jsonData($baiDangTuyen);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaiDangTuyen $baiDangTuyen)
    {
        try {
			$baiDangTuyen->delete();
		    return $this->jsonMessage("Xóa thành công");
	    } catch (\Exception $e) {
	    	return $this->jsonError($e);
	    }
    }
}
