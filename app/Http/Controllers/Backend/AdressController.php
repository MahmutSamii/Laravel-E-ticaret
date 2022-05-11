<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdressController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/users/{}/addresses";
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(User $user)
    {
        $addrs = $user->addrs;
        return view('Backend.addresses.index', compact('addrs','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|
     */
    public function create(User $user)
    {
        return view('Backend.addresses.insert_form',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user,AddressRequest $request): \Illuminate\Http\RedirectResponse
    {
        $addr = new Adress();
        $data = $this->preapare($request,$addr->getFillable());
        $addr->fill($data);
        $addr->save();
        $this->editReturnUrl($user->user_id);
        return Redirect::to($this->returnUrl);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Adress $address
     * @return \Illuminate\Contracts\View\View
     */

    public function edit(User $user,Adress $address): \Illuminate\Contracts\View\View
    {
        return view('Backend.addresses.update_form', compact('address','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressRequest $request, User $user , Adress $address): \Illuminate\Http\RedirectResponse
    {
        $data = $this->preapare($request,$address->getFillable());
        $address->fill($data);
        $address->update();
        $this->editReturnUrl($user->user_id);
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user,Adress $address): \Illuminate\Http\JsonResponse
    {
        $address->delete();
        return response()->json(['message' => 'Done', 'id' => $address->address_id]);
    }

    private function editReturnUrl($id){
        $this->returnUrl = "/users/$id/addresses";
    }
}
