<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class Category extends Component
{
    use WithFileUploads;
    //use WithPagination;

    public $page = 'index';
    protected $paginationTheme='bootstrap';
    protected $queryString = ['search_name','search_created_at'];
    //input
    public $name, $notes, $status, $image, $parent_id, $slug, $category_id;

    //search
    public $search_name='', $search_created_at='';

    public function submit($step)
    {
        $this->page = $step;
    }

    protected $rules = [
        'name' => [
            'required',
            'string',
            'min:3',
            'max:255',
        ],
        'parent_id' => [
            'nullable', 'exists:categories,id',
        ],
        'notes' => [
            'nullable', 'string',
        ],

        'image' => [
            'nullable', 'image',
        ],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearForm()
    {
        $this->name = '';
        $this->notes = '';
        $this->image = '';
        $this->status = '';
        $this->parent_id = '';
    }

    public function store()
    {

        $validatedData = $this->validate();

        $this->slug = Str::slug($this->name);


            //$path = $this->image->store('Categories', ['disk' => 'public']);
            $this->image = $this->image->store('public');

        ModelsCategory::create([
            'slug' => $this->slug,
            'name' => $this->name,
            'notes' => $this->notes,
            'parent_id' => $this->parent_id,
            'image' => $this->image,
            //'status' => $this->status,
        ]);
        Session()->flash('success', 'Addition completed successfully');
        $this->clearForm();
        $this->page = 'index';
        //return redirect()->to('/ss');

    }

    public function edit($id)
    {
        $category = ModelsCategory::findOrFail($id);

        $this->page = 'edit';

        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->notes = $category->notes;
        $this->parent_id = $category->parent_id;
        $this->image = $category->image;
        $this->status = $category->status;
    }
    public function update()
    {
        $category = ModelsCategory::findOrFail($this->category_id);

        $validatedData = $this->validate();

        $this->slug = Str::slug($this->name);

        $old_image = $category->image;
        if ($this->image) {
            // Get the original filename
            $filename = $this->image->getClientOriginalName();
            // Store the image file in the public storage folder
            $path = $this->image->store('public');
        }

        if ($old_image && $this->image) {
            Storage::delete($old_image);
        }

        $category->update([
            'slug' => $this->slug,
            'name' => $this->name,
            'notes' => $this->notes,
            'parent_id' => $this->parent_id,
            'image' => $this->image,
            //'status' => $this->status,
        ]);
        $this->clearForm();
        Session::flash('success', 'Edition completed successfully');
        $this->page = 'index';
        // return redirect()->to('/ss');
    }

    public function delete($id)
    {
        $category = ModelsCategory::findOrFail($id);
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete($id);
        Session()->flash('success', 'The deletion was completed successfully');
        $this->page = 'index';
        //return redirect()->to('/ss');
    }

    public function render()
    {

        return view('livewire.category',
            [
                'categories' => ModelsCategory::with('parent')
                    ->where('name','like', '%'.$this->search_name.'%')
                    ->orWhereDate('created_at',$this->search_created_at)
                    ->latest()
                    ->simplepaginate(12),
                'parent' => ModelsCategory::all(),
            ]);
    }
}
