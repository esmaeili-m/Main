<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Event;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Event $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $description;
    public $title;
    public $image;
    public $slug;
    public $category_id;
    public $tag;
    public $id;
    public $tags=[];
    public $tags_labels=[];
    public $video_url;
    public $content;
    public $status;
    public $event_date;
    public $event_time;
    public $location;

    public function mount(Event $dataModel)
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
            'title'        => 'required|string|min:3|max:255',
            'slug'         => 'required|string|alpha_dash|unique:events,slug',
            'description'  => 'required|string|min:10|max:500',
            'content'      => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url'    => 'nullable|url',
            'event_date'   => 'required|date|after_or_equal:today',
            'event_time'   => 'nullable|date_format:H:i:s',
            'location'     => 'nullable|string|max:255',
            'category_id'  => 'nullable|exists:categories,id',
        ];

    }

    protected $messages = [
        // 🟩 عنوان
        'title.required' => 'وارد کردن عنوان رویداد الزامی است.',
        'title.string'   => 'عنوان باید به صورت متن باشد.',
        'title.min'      => 'عنوان باید حداقل ۳ کاراکتر باشد.',
        'title.max'      => 'عنوان نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

        // 🟩 اسلاگ
        'slug.required'    => 'وارد کردن اسلاگ الزامی است.',
        'slug.string'      => 'اسلاگ باید به صورت متن باشد.',
        'slug.alpha_dash'  => 'اسلاگ فقط می‌تواند شامل حروف، عدد، خط تیره و زیرخط باشد.',
        'slug.unique'      => 'این اسلاگ قبلاً استفاده شده است.',

        // 🟩 توضیحات کوتاه
        'description.string' => 'توضیحات باید به صورت متن باشد.',
        'description.min'    => 'توضیحات باید حداقل ۱۰ کاراکتر باشد.',
        'description.max'    => 'توضیحات نمی‌تواند بیش از ۵۰۰ کاراکتر باشد.',

        // 🟩 محتوا
        'content.string' => 'متن کامل باید به صورت رشته‌ای از نوع متن باشد.',

        // 🟩 تصویر
        'image.image' => 'فایل انتخابی باید تصویر باشد.',
        'image.mimes' => 'تصویر باید یکی از فرمت‌های jpeg، png، jpg یا gif باشد.',
        'image.max'   => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

        // 🟩 ویدیو
        'video_url.url' => 'آدرس ویدیو معتبر نیست.',

        // 🟩 تاریخ و ساعت رویداد
        'event_date.required'        => 'تاریخ برگزاری الزامی است.',
        'event_date.date'            => 'تاریخ باید معتبر باشد.',
        'event_date.after_or_equal'  => 'تاریخ برگزاری نمی‌تواند قبل از امروز باشد.',
        'event_time.date_format'     => 'فرمت ساعت برگزاری باید به صورت HH:MM باشد.',

        // 🟩 محل برگزاری
        'location.string' => 'محل برگزاری باید متن باشد.',
        'location.max'    => 'طول متن محل برگزاری نباید بیشتر از ۲۵۵ کاراکتر باشد.',

        // 🟩 دسته‌بندی
        'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',


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
        $this->reset(['title','slug','description','content','image','id','event_date','location','category_id','event_time','location']);
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
        $data=$this->dataModel->find($id);
        $this->title=$data->title;
        $this->id=$data->id;
        $this->slug=$data->slug;
        $this->event_date=$data->event_date;
        $this->location=$data->location;
        $this->category_id=$data->category_id  ;
        $this->image=$data->image;
        $this->description=$data->description;
        $this->content=$data->content;
        $this->event_time=$data->event_time;
        $this->dispatch('update_item');

    }

    public function resetData()
    {
        $this->reset(['title','slug','description','content','image','id','event_date','event_time','location','category_id']);
        $this->dispatch('reset_modal_data');

    }
    public function createItem()
    {

        $validated = $this->validate();
        if ( $this->image){
            $validated['image'] = $this->image->store('uploads/events', 'public');
        }

        $validated['user_id'] = auth()->id() ?? 1;

        if (($validated['status'] ?? null) === 'published' && empty($this->published_at)) {
            $validated['published_at'] = now();
        }

        Event::create($validated);
        $this->resetModal();
    }
    public function updateItem()
    {
        $validated = $this->validate([
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:events,slug,'.$this->id,
            'description' => 'required|string|min:10|max:500',
            'content' => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url'    => 'nullable|url',
            'event_date'   => 'required|date|after_or_equal:today',
            'event_time'   => 'nullable|date_format:H:i:s',
            'location'     => 'nullable|string|max:255',
            'category_id'  => 'nullable|exists:categories,id',

        ],[
            'title.required' => 'وارد کردن عنوان رویداد الزامی است.',
            'title.string'   => 'عنوان باید به صورت متن باشد.',
            'title.min'      => 'عنوان باید حداقل ۳ کاراکتر باشد.',
            'title.max'      => 'عنوان نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            // 🟩 اسلاگ
            'slug.required'    => 'وارد کردن اسلاگ الزامی است.',
            'slug.string'      => 'اسلاگ باید به صورت متن باشد.',
            'slug.alpha_dash'  => 'اسلاگ فقط می‌تواند شامل حروف، عدد، خط تیره و زیرخط باشد.',
            'slug.unique'      => 'این اسلاگ قبلاً استفاده شده است.',

            // 🟩 توضیحات کوتاه
            'description.string' => 'توضیحات باید به صورت متن باشد.',
            'description.min'    => 'توضیحات باید حداقل ۱۰ کاراکتر باشد.',
            'description.max'    => 'توضیحات نمی‌تواند بیش از ۵۰۰ کاراکتر باشد.',

            // 🟩 محتوا
            'content.string' => 'متن کامل باید به صورت رشته‌ای از نوع متن باشد.',

            // 🟩 تصویر
            'image.image' => 'فایل انتخابی باید تصویر باشد.',
            'image.mimes' => 'تصویر باید یکی از فرمت‌های jpeg، png، jpg یا gif باشد.',
            'image.max'   => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

            // 🟩 ویدیو
            'video_url.url' => 'آدرس ویدیو معتبر نیست.',

            // 🟩 تاریخ و ساعت رویداد
            'event_date.required'        => 'تاریخ برگزاری الزامی است.',
            'event_date.date'            => 'تاریخ باید معتبر باشد.',
            'event_date.after_or_equal'  => 'تاریخ برگزاری نمی‌تواند قبل از امروز باشد.',
            'event_time.date_format'     => 'فرمت ساعت برگزاری باید به صورت HH:MM باشد.',

            // 🟩 محل برگزاری
            'location.string' => 'محل برگزاری باید متن باشد.',
            'location.max'    => 'طول متن محل برگزاری نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // 🟩 دسته‌بندی
            'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',
        ]);
        if (!$this->category_id){
            $validated['category_id']=null;
        }
        if (isset($validated['image']) && !is_string($validated['image'])) {
            $validated['image'] = $this->image->store('uploads/events', 'public');
        }
        Event::find($this->id)->update($validated);
        $this->resetModal();

    }

    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.events.index',compact('data'));
    }
}
