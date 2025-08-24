<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                    <div class="btns-table d-flex gap-2">
                        <button data-toggle="modal" data-target="#create" type="button" class="btn-hover btn-sm btn-border-radius color-5">ایجاد دسته بندی</button>
                        <button class="btn-hover btn-sm btn-border-radius color-4">سطل آشغال</button>
                    </div>
                </div>
                <hr>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته</th>
                            <th>وضعیت دسته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$item->title}}</td>
                                <td>
                                    @if($item->status)
                                        <button class="btn-hover btn-sm btn-border-radius color-1">فعال</button>
                                    @else
                                        <button class="btn-hover btn-sm btn-border-radius color-2">غیرفعال</button>
                                    @endif
                                </td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog"
         aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-create">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">{{$this->editMode ? 'ویرایش دسته بندی' : 'ساخت دسته بندی'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="email_address1">عنوان دسته بندی</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="title" wire:model.lazy="title" class="form-control"
                                       placeholder="عنوان دسته بندی را وارد کنید">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_address1">آدرس دسته بندی</label>
                            <div class="form-line">
                                <input type="text" id="slug" wire:model.lazy="slug" class="form-control"
                                       placeholder="آدرس دسته بندی را وارد کنید">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_address1">توضیحات دسته بندی</label>
                            <div wire:ignore>
                                <div  id="description"></div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="create()" type="button" class="btn-hover btn-sm btn-border-radius color-5">ذخیره</button>
                    <button wire:click="resetModal()" type="button" class="btn-hover btn-sm btn-border-radius color-2">بستن</button>

                </div>
            </div>
        </div>
    </div>
@section('styles')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
 @endsection
@section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="{{asset('dashboard/js/app.min.js')}}"></script>
        <script src="{{asset('dashboard/js/admin.js')}}"></script>

        <script>
            document.addEventListener('livewire:initialized', function () {
                const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                ['link', 'image'],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'align': [] }],
                ['clean']
            ];
                const quill = new Quill('#description', {
                    modules: {
                        toolbar: toolbarOptions,
                    },
                    placeholder: 'توضیحات خود راوارد کنید...',
                    theme: 'snow'
                });
                quill.on('text-change', function() {
                    let html = quill.root.innerHTML;
                    @this.set('description', html);
                });
                function imageHandler() {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.click();
                    input.onchange = () => {
                        var file = input.files[0];
                        if (/^image\//.test(file.type)) {
                            // آپلود به سرور
                            var formData = new FormData();
                            formData.append('image', file);

                            fetch('/upload-image', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    const range = quill.getSelection();
                                    quill.insertEmbed(range.index, 'image', data.url);
                                })
                                .catch(err => console.error('Upload failed', err));
                        } else {
                            alert('لطفاً فقط فایل تصویر انتخاب کنید.');
                        }
                    };
                }
                quill.getModule('toolbar').addHandler('image', imageHandler);
             });
        </script>
@endsection
</div>
