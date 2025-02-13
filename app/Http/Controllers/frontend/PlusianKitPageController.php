<?php

namespace App\Http\Controllers\frontend;

use App\Models\PlusianKit;
use Illuminate\Http\Request;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;

class PlusianKitPageController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Plusian Kit';
        $query = PlusianKit::query();
    
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }
    
        $plusians = $query->get();
    
        return view('frontend.plusian-kit', compact('title','plusians'));
    }

    public function detail($slug)
    {
        $title = TranslationHelper::getTranslation('Plusian Kit');
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        $plusians = PlusianKit::All();
    
        return view('frontend.plusian-kit-detail', compact('title', 'plusian', 'plusians'));
    }
}
