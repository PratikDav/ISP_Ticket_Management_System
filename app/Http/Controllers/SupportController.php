<?php

namespace App\Http\Controllers;

class SupportController extends Controller
{
    /************************
    Admin Section Start
     **************************/
    public function adminSupport()
    {
        return view('admin.pages.support.admin_support');
    }
/************************
Admin Section End
 **************************/

    /************************
    Client Section Start
     **************************/
    public function clientSupport()
    {
        return view('client.support.client_support');

    }

/************************
Client Section End
 **************************/

}
