<?php

namespace App\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Trash extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Category $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $description;
    public $title;
    public $slug;
    public $id;
    public $image;
    public $parent_id;

    public function mount(Category $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='دسته بندی ها';
    }

    public function remove_item($id)
    {
        $data=$this->dataModel->withTrashed()->find($id);
        if ($data){
            $data->forceDelete();
            $this->dispatch('alert',message:'آیتم با موفقیت حذف شد');
        }
    }
    public function restore_item($id)
    {
        $data=$this->dataModel->withTrashed()->find($id);
        if ($data){
            $data->restore();
            $this->dispatch('alert',message:'آیتم با موفقیت بازگردانی شد');
        }

    }


    public function render()
    {
        $data=[];
        $data= $this->dataModel->onlyTrashed()->paginate($this->paginate);
        return view('livewire.dashboard.categories.trash',compact('data'));
    }
}
