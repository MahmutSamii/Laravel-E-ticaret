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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/users";
    }


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
        $user = new User();
        $data = $this->preapare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(User $user)
    {
        return view('Backend.users.update_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {

        $data = $this->preapare($request,$user->getFillable());
        $user->fill($data);
        $user->update();
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {

        $user->delete();
        return response()->json(['message' => 'Done', 'id' => $user->user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function passwordForm(User $user)
    {
        return view('Backend.users.password_form', ['user' => $user]);
    }

    public function changePassword(User $user, UserRequest $request)
    {
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
