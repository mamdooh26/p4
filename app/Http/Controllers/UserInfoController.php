<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Log;
use App\UserInfo;
use App\Country;

class UserInfoController extends Controller
{
    public function userList()
    {
        $userinfos = UserInfo::orderBy('first_name', 'asc')->get();
        return view('userList')->with([
            'userinfos' => $userinfos,
        ]);
    }

    public function userEdit($id)
    {
        $userinfo = UserInfo::find($id);
        return view('userEdit')->with([
            'countryForCheckboxes' => country::getForCheckboxes(),
            'userinfo' => $userinfo,
            'countries'=> $userinfo->countries()->pluck('countries.id')->toArray(),


        ]);
    }

    public function tourism(Request $request)
    {
        $firstName = $request->session()->get('firstName');
        $familyName = $request->session()->get('familyName');
        $country = $request->session()->get('country');

        $countryForCheckboxes = country::getForCheckboxes();

        return view('tourism')->with([
            'countryForCheckboxes' => $countryForCheckboxes,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'familyName' => 'required',
        ]);
        $firstName = $request->input('firstName');
        $familyName = $request->input('familyName', null);
        $country = $request->session()->get('country');

        $userInfo = new UserInfo();
        $userInfo->first_name = $firstName;
        $userInfo->family_name = $familyName;
        $userInfo->save();
        $userInfo->countries()->sync($request->input('countries'));

        return redirect('/')->with([
            'waysOfSplit' => $firstName,
            'tabCost' => $familyName,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'familyName' => 'required',
        ]);

        $userinfo = UserInfo::find($id);
        $userinfo->first_name = $request->firstName;
        $userinfo->family_name = $request->familyName;
        $userinfo->save();
        $userinfo->countries()->sync($request->input('countries'));

        return redirect('/userList')->with([
            'confirmation' => 'User data has been updated',
        ]);
    }

    public function destroy($id){
        $userinfo = UserInfo::find($id);

        $userinfo->delete();
        $userinfo->countries()->detach();
        return redirect('/userList');
    }


}