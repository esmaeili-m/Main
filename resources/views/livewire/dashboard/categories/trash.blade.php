<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center p-4">
                <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                <div class="btns-table d-flex gap-2">
                    <a href="{{route('categories.list')}}" class="btn-hover btn-sm btn-border-radius color-4">بازگشت</a>
                </div>
            </div>
            <hr>
            <div class="body table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
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
                                <button wire:click="restore_item({{$item->id}})"  class="btn tblActnBtn">
                                    <i class="material-icons">undo</i>
                                </button>
                                <button wire:click="remove_item({{$item->id}})" class="btn tblActnBtn">
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
