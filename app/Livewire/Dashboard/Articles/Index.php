<?php

namespace App\Livewire\Dashboard\Articles;

use App\Models\Article;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Article $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $description;
    public $title;
    public $thumbnail;
    public $slug;
    public $category_id;
    public $tag;
    public $id;
    public $tags=[];
    public $tags_labels=[];
    public $video_url;
    public $content;
    public $status;

    public function mount(Article $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='مقاله ها';
    }

    public function UpdatedTag()
    {
        if (!$this->tag) {
            return;
        }

        $tag = Tag::find($this->tag);

        if ($tag) {
            if (!in_array($tag->id, $this->tags)) {
                $this->tags[] = $tag->id;
                $this->tags_labels[] = $tag->name;
            }
        }
        $this->tag = '';
    }

    public function remove_item($id)
    {
        unset($this->tags[$id]);
        $this->tags_labels = [];
        foreach ($this->tags as $item) {
            $tag = Tag::find($item);
            if ($tag) {
                $this->tags_labels[] = $tag->name;
            }
        }
        $this->tags = array_values($this->tags);
    }
    public function remove_item_post($id)
    {
        $data=$this->dataModel->find($id);
        if ($data){
            $data->delete();
        }
    }
    public function search()
    {
        $this->IsFillter=true;
    }
    protected function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:articles,slug',
            'description' => 'required|string|min:10|max:500',
            'category_id' => 'required',
            'content' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    protected $messages = [
        'title.required' => 'وارد کردن عنوان الزامی است.',
        'title.string' => 'عنوان باید متن باشد.',
        'title.min' => 'عنوان نباید کمتر از ۳ کاراکتر باشد.',
        'title.max' => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',

        'slug.required' => 'وارد کردن آدرس الزامی است.',
        'slug.string' => 'اسلاگ باید متن باشد.',
        'slug.alpha_dash' => 'اسلاگ فقط می‌تواند شامل حروف، عدد، خط تیره و زیرخط باشد.',
        'slug.unique' => 'این اسلاگ قبلاً استفاده شده است.',

        'description.required' => 'وارد کردن توضیحات الزامی است.',
        'description.string' => 'توضیحات باید متن باشد.',
        'description.min' => 'توضیحات نباید کمتر از ۱۰ کاراکتر باشد.',
        'description.max' => 'توضیحات نباید بیشتر از ۵۰۰ کاراکتر باشد.',

        'thumbnail.required' => 'آپلود تصویر شاخص الزامی است.',
        'thumbnail.image' => 'فایل انتخابی باید تصویر باشد.',
        'thumbnail.mimes' => 'تصویر باید یکی از فرمت‌های jpeg، png، jpg یا gif باشد.',
        'thumbnail.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
    ];
    public function change_status($id)
    {
        $data=$this->dataModel->find($id);
        if ($data->status=='published'){
            $data->update(['status'=>'draft']);
        }else{
            $data->update(['status'=>'published']);
        }
    }

    public function resetModal()
    {
        $this->reset(['title','slug','description','content','thumbnail','id','tags','tags_labels']);
        $this->dispatch('close_modal');
    }
    public function UpdatedTitle()
    {
        if (!$this->id){
            $this->slug=str_replace(' ','-',$this->title);
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
    public function set_item($id)
    {
        $data=$this->dataModel->with('tags.tag')->find($id);
        $this->title=$data->title;
        $this->id=$data->id;
        $this->slug=$data->slug;
        $this->category_id=$data->category_id;
        $this->thumbnail=$data->thumbnail;
        $this->description=$data->description;
        $this->content=$data->content;
        $this->tags_labels=$data->tags->pluck('name','id')->toArray();
        $this->tags=array_keys($this->tags_labels);
        $this->dispatch('update_item');

    }

    public function resetData()
    {
        $this->reset(['title','slug','description','content','thumbnail','id','tags','tags_labels']);
        $this->dispatch('reset_modal_data');

    }
    public function createItem()
    {

        $validated = $this->validate();
        $validated['thumbnail'] = $this->thumbnail->store('uploads/articles', 'public');

        $validated['user_id'] = auth()->id() ?? 1;

        if (($validated['status'] ?? null) === 'published' && empty($this->published_at)) {
            $validated['published_at'] = now();
        }

        $post= Article::create($validated);
        $post->tags()->attach($this->tags);
        $this->resetModal();
                $this->dispatch('alert',message:'آیتم با موفقیت ایجاد شد');

    }
    public function updateItem()
    {
        $validated = $this->validate([
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:articles,slug,'.$this->id,
            'description' => 'required|string|min:10|max:500',
            'category_id' => 'required',
            'content' => 'nullable|string',
            'thumbnail' => 'required',
        ]);

        if (isset($validated['image']) && !is_string($validated['image'])) {
            $validated['thumbnail'] = $this->image->store('uploads/articles', 'public');
        }
        Article::find($this->id)->update($validated);
        $this->resetModal();
                $this->dispatch('alert',message:'آیتم با موفقیت آپدیت شد');


    }

    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.articles.index',compact('data'));
    }
}
