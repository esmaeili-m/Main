<?php

namespace App\Livewire\Dashboard\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    public string $question_page;
    public Faq $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $answer;
    public $question;
    public $id;
    use WithFileUploads;

    public function mount(Faq $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->question_page='دسته بندی ها';
    }

    public function search()
    {
        $this->IsFillter=true;
    }
    protected function rules()
    {
        return [
            'question' => 'required|string|min:3|max:255',
            'answer' => 'required|string|min:10',

        ];
    }


    public function resetModal()
    {
        $this->reset(['question','answer','id']);
        $this->dispatch('close_modal');
    }

    public function resetData()
    {
        $this->reset(['question','answer','id']);
        $this->dispatch('reset_modal_data');

    }


    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->question=$data->question;
        $this->id=$data->id;
        $this->answer=$data->answer;
        $this->dispatch('update_item');

    }
    public function remove_item($id)
    {
        $data=$this->dataModel->find($id);
        if ($data){
            $data->delete();
            $this->dispatch('alert',message:'آیتم با موفقیت حذف شد');

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
        Faq::create($validated);
        $this->resetModal();
    }
    public $tempImage;
    public function updatedTempImage()
    {
        $path = $this->tempImage->store('uploads/categories', 'public');
        $url = asset('storage/' . $path);
        $this->dispatch('imageUploaded', $url);
    }
    public function updateItem()
    {
        $validated = $this->validate([
            'question' => 'required|string|min:3|max:255',
            'answer' => 'required|string|min:10',

        ]);


        Faq::find($this->id)->update($validated);
        $this->resetModal();


    }
    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.faq.index',compact('data'));
    }
}
