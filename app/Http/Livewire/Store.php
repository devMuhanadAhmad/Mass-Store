<?php

namespace App\Http\Livewire;

use App\Models\Store as ModelsStore;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;

    public $curr_page='index';
    protected $paginationTheme='bootstrap';

    //search
    public $search_name;


    public function render()
    {

        return view('livewire.store',
            [
                'store' => ModelsStore::with('user')
                ->where('name','like', '%'.$this->search_name.'%')
                ->latest()
                ->paginate(12),
            ]);
    }
}
