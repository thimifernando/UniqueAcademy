<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)

{
  return$get_name = $request->search_fs_name;

}
}
