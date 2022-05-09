<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('Backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('Backend.users.insert_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $is_admin = $request->get('is_admin', 0);
        $is_active = $request->get('is_active', 0);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;
        $user->save();
        return Redirect::to('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Backend.users.update_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, $id): RedirectResponse
    {
        $is_admin = $request->get('is_admin', 0);
        $is_active = $request->get('is_active', 0);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;
        $user->update();
        return Redirect::to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Done', 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function passwordForm()
    {

    }

    public function changePassword()
    {

    }
}
