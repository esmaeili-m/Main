<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                    <div class="btns-table d-flex gap-2">
                        <button data-toggle="modal" data-target="#create" type="button" class="btn-hover btn-sm btn-border-radius color-5">ایجاد تگ</button>
                        <button class="btn-hover btn-sm btn-border-radius color-4">سطل آشغال</button>
                    </div>
                </div>
                <hr>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام تگ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$item->name}}</td>

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
                    <h5 class="modal-title" id="formModal">{{$this->editMode ? 'ویرایش تگ' : 'ساخت تگ'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">عنوان تگ</label>
                            <input type="text" id="title" wire:model.lazy="name"
                                   class="form-control "
                                   placeholder="عنوان تگ را وارد کنید">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">آدرس تگ</label>
                            <input type="text" id="slug" wire:model.lazy="slug"
                                   class="form-control "
                                   placeholder="آدرس تگ را وارد کنید">
                            @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
        <script src="{{asset('dashboard/js/app.min.js')}}"></script>
        <script src="{{asset('dashboard/js/admin.js')}}"></script>
        <script src="{{asset('dashboard/js/pages/forms/basic-form-elements.js')}}"></script>
    @endsection
</div>
