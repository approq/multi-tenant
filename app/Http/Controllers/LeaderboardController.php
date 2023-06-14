<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::withSum('xpEntries', 'xp')
                ->orderByDesc('xp_entries_sum_xp')
                ->paginate(10)
        );
    }
}
