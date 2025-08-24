<?php

namespace App\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
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

    public function mount(Category $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='دسته بندی ها';
    }

    public function search()
    {
        $this->IsFillter=true;
    }

    public function create()
    {
        dd($this->description,$this->title,$this->slug);
    }
    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.categories.index',compact('data'));
    }
}
