<?php

namespace App\Http\Controllers;


class SidebarController extends Controller
{
    public function getMenuData()
    {
        // $menuGroups = config('siderbar.menuGroups');

        return view('components.sidebar');
    }
}
