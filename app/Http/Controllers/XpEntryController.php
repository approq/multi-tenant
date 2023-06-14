<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardXpRequest;
use App\Http\Resources\XpEntryResource;
use App\Models\XpEntry;
use Illuminate\Http\Request;

class XpEntryController extends Controller
{
    public function store(AwardXpRequest $request)
    {
        return response()->json([
            'message' => 'XP awarded successfully',
            'xpEntry' => XpEntryResource::make(XpEntry::create($request->validated()))
        ]);
    }
}
