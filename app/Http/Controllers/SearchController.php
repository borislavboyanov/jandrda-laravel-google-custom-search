<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class SearchController extends Controller
{
    public function search() {
      $fulltext = new LaravelGoogleCustomSearchEngine();

      $fulltext->setEngineId('014058479932776350357:2st9ktghynh');
      $fulltext->setApiKey('AIzaSyDd6e5WxJ4Ml1I9xFSyLmuiyvtvWXeag1o');

      $results = $fulltext->getResults('Donald Trump');

      return view('search', ['results' => $results]);
    }
}
