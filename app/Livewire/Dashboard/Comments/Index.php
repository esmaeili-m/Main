<?php

namespace App\Livewire\Dashboard\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Comment $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $description;
    public $name;
    public $email;
    public $id;
    public $content;
    public $replay_id;

    public function mount(Comment $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='دسته بندی ها';
    }

    public function search()
    {
        $this->IsFillter=true;
    }
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ];
    }

    public function change_status($id)
    {
        $data=$this->dataModel->find($id);
        if ($data->status == 'pending'){
            $data->update(['status'=>'approved']);
        }elseif($data->status == 'approved'){
            $data->update(['status'=>'rejected']);
        }else{
            $data->update(['status'=>'pending']);
        }
        $this->dispatch('alert',message:'آیتم با موفقیت آپدیت شد');

    }

    public function resetModal()
    {
        $this->reset(['name','email','content','replay_id','id']);
        $this->dispatch('close_modal');
    }

    public function resetData()
    {
        $this->reset(['name','email','content','replay_id','id']);
        $this->dispatch('reset_modal_data');

    }


    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->name=$data->name;
        $this->id=$data->id;
        $this->email=$data->email;
        $this->content=$data->content;
        $this->dispatch('update_item');

    }
    public function replay_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->name='Admin';
        $this->replay_id=$data->id;
        $this->email='info@syedalishah.com';

    }

    public function UpdatedTitle()
    {
        if (!$this->id){
            $this->slug=str_replace(' ','-',$this->title);
        }
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
        }elseif($this->replay_id) {
            return $this->replay();
        }else{
            return $this->createItem();
        }
    }

    public function replay()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        $data=$this->dataModel->find($this->replay_id);
        $validated['parent_id']=$this->replay_id;
        $validated['commentable_type']=$data->commentable_type;
        $validated['commentable_id']=$data->commentable_id;
        $validated['status']='approved';
        Comment::create($validated);
        $this->resetModal();

    }
    public function createItem()
    {
        $validated = $this->validate();
        $validated['image'] = $this->image->store('uploads/categories', 'public');
        $validated['order'] = Comment::max('order')+1;
        Comment::create($validated);
        $this->resetModal();
        $this->dispatch('alert',message:'آیتم با موفقیت ایجاد شد');
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
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);

        Comment::find($this->id)->update($validated);
        $this->resetModal();
//        $this->dispatch('alert',message:'آیتم با موفقیت آپدیت شد');


    }
    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }

        return view('livewire.dashboard.comments.index',compact('data'));
    }
}
