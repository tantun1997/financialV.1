<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ActionPlan extends Component
{
    public function render()
    {
        $ACP_ProjectName_Main = DB::table('ACP_ProjectName_Main')->get();

        return view('livewire.action-plan', ['ACP_ProjectName_Main' => $ACP_ProjectName_Main]);
    }
}
