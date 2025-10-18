<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    public string $title_page;
    public Tag $dataModel;
    public bool $editMode= false;
    public int $paginate= 15;
    public $name;
    public $slug;
    public $id;

    public function mount(Tag $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='تگ ها';
    }
    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:tags,slug',
        ];
    }
    public function UpdatedName()
    {
        if (!$this->id){
            $this->slug=str_replace(' ','-',$this->name);
        }
    }
    public function create()
    {
        if ($this->id){
            return $this->updateItem();
        }else{
            return $this->createItem();

        }
    }
    public function createItem()
    {
        $validated = $this->validate();
        Tag::create($validated);
        $this->resetModal();

    }
    public function updateItem()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:categories,slug,'.$this->id,
        ]);


        Tag::find($this->id)->update($validated);
        $this->resetModal();

    }
    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->name=$data->name;
        $this->id=$data->id;
        $this->slug=$data->slug;
        $this->dispatch('update_item');

    }
    public function resetModal()
    {
        $this->reset(['name','slug','id']);
        $this->dispatch('close_modal');
    }

    public function resetData()
    {
        $this->reset(['name','slug','id']);
        $this->dispatch('reset_modal_data');

    }
    public function render()
    {
        $data= $this->dataModel->paginate($this->paginate);
        return view('livewire.dashboard.tags.index',compact('data'));
    }
}
