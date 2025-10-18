<?php

namespace App\Livewire\Dashboard\Messages;

use App\Models\Message;
use Livewire\Component;

class Index extends Component
{
    public string $title_page;
    public Message $dataModel;
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

    public function mount(Message $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='دسته بندی ها';
    }

    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->latest()->paginate($this->paginate);
        }
        return view('livewire.dashboard.messages.index',compact('data'));
    }
}
