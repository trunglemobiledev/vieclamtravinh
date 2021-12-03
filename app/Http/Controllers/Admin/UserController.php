<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\QueryService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;
use Exception;

class UserController extends Controller
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

			$queryService = new QueryService(new User);
            $queryService->select = ['id','name','email','diaChi','phone'];
            // $queryService->select = [];
            $queryService->columnSearch = ['name'];
            $queryService->withRelationship = [];
            $queryService->search = $search;
            $queryService->betweenDate = $betweenDate;
            $queryService->limit = $limit;
            $queryService->ascending = $ascending;
            $queryService->orderBy = $orderBy;

            $query = $queryService->queryTable();
            $query = $query->paginate($limit);
            $users = $query->toArray();
			return $this->jsonTable($users);
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
            $requestAll = [
                'email' => $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'diaChi' => $request->diaChi,
                'cccd' => $request->cccd,
                'sex' => $request->sex,
                'mst' => $request->mst,
                'googleAccount' => $request->googleAccount,
                'facebookAccount' => $request->facebookAccount,
                'avatar' => $request->avatar,
                'votes' => $request->votes,
                'password' => bcrypt($request->password)
            ];
            $user = User::create($requestAll);
            return $this->jsonData($user, Response::HTTP_CREATED);
		} catch (\Exception $e) {
			return $this->jsonError($e);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
            return $this->jsonData($user);
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
    public function update(Request $request, $id)
    {
        // dd("=========");
        try {
        $requestAll = User::find($id);
        $requestAll->name = $request->name;
        $requestAll->email = $request->email;
        $requestAll->phone = $request->phone;
        $requestAll->dob = $request->dob;
        $requestAll->diaChi = $request->diaChi;
        $requestAll->cccd = $request->cccd;
        $requestAll->sex = $request->sex;
        $requestAll->mst = $request->mst;
        $requestAll->googleAccount = $request->googleAccount;
        $requestAll->facebookAccount = $request->facebookAccount;
        $requestAll->avatar = $request->avatar;
        $requestAll->votes = $request->votes;
        $requestAll->password = bcrypt($request->password);
        $requestAll->save();
        return $this->jsonMessage("Update sucessfully");
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
    public function destroy(User $user)
    {
        try {
			$user->delete();
		    return $this->jsonMessage("Xóa thành công");
	    } catch (\Exception $e) {
	    	return $this->jsonError($e);
	    }
    }
}
