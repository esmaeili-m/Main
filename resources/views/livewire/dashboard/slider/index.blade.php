<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                    <div class="btns-table d-flex gap-2">
                        <button wire:click="resetData()" data-toggle="modal" data-target="#create" type="button" class="btn-hover btn-sm btn-border-radius color-5">ایجاد اسلایدر</button>
                    </div>
                </div>
                <hr>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر اسلایدر</th>
                            <th>عنوان اسلایدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <th >
                                    <img class="post-avatar" width="70px" height="70px" src="{{asset('storage/'.$item->image)}}">
                                </th>
                                <td>{{$item->title}}</td>

                                <td>
                                    <button data-toggle="modal" data-target="#create" wire:click="set_item({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button wire:click="remove_item_post({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
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
                    <h5 class="modal-title" id="formModal">{{$this->editMode ? 'ویرایش  اسلایدر' : 'ساخت  اسلایدر'}}</h5>
                    <button id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">عنوان  اسلایدر</label>
                            <input type="text" id="title" wire:model.lazy="title"
                                   class="form-control "
                                   placeholder="عنوان  اسلایدر را وارد کنید">
                            @error('title')
                            <div class="invalid-feedback  d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">خلاصه اسلایدر</label>
                            <textarea id="description" wire:model.lazy="description" rows="3"  placeholder="خلاصه  اسلایدر را وارد کنید"></textarea>
                            @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>تصویر  اسلایدر</label>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>فایل</span>
                                    <input wire:model.lazy="image" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('thumbnail')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="create()" type="button" class="btn-hover btn-sm btn-border-radius color-5">ذخیره</button>
                    <button wire:click="resetModal()" type="button" class="btn-hover btn-sm btn-border-radius color-2">بستن</button>

                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{asset('dashboard/js/pages/forms/basic-form-elements.js')}}"></script>
        <script>

            document.addEventListener('livewire:initialized', function () {
                Livewire.on("close_modal", () => {
                    document.getElementById('close_modal').click()
                });


            });
        </script>
    @endsection
</div>
