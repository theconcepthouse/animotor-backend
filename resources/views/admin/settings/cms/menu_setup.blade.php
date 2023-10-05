@extends('admin.layout.app')

@section('style')

@endsection

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Menu Setup</h4>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt d-none d-sm-block">
                                                <a class="btn btn-primary" data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                            </li>

                                            <li class="nk-block-tools-opt d-block d-sm-none">
                                                <a class="btn btn-icon btn-primary"  data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->

                        </div>

                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="nk-block nk-block-lg">

                        @foreach(menus('frontpage-top-menu') as $item)
                            <a href="{{ $item->url }}">{{ $item->label }}</a>
                        @endforeach

                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                        <div class="row">
                            @foreach($menus as $item)
                                <div class="col-6 mt-2">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-header flex justify-between border-bottom">
                                            <div class="">
                                                {{ $item->name }}[{{ $item->slug }}]
                                            </div>
                                            <div class="">
                                                <div class="btn-group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-xs btn-outline-info">Edit</button>

                                                    <a data-bs-toggle="modal" data-menu-type="menu" data-menu-id="{{ $item->id }}" href="#deleteMenu" class="btn btn-xs btn-outline-danger delete_menu">Delete</a>

                                                 </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            @if($item->items->count() > 0)
                                                @include('admin.partials.menu_items', ['menuItems' => $item->items])
                                            @endif

                                                <div class="card card-bordered mt-1">
                                                    <div class="flex justify-between p-1">
                                                        <div class="d-flex gap-3">
                                                            <div class="mr-2">
                                                                <em class="icon ni ni-capsule"></em>
                                                            </div>
                                                            <div class="">
                                                                <p><a  data-bs-toggle="modal" data-item-id="{{ $item->id }}" href="#addNewItem" class="add_menu_item">Add menu item</a></p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                        </div>



                                    </div><!--card-->
                                </div>

                            @endforeach
                        </div>
                            </div>
                        </div>


                    </div><!--nk-block-->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add New Menu</h5>

                    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row gy-4 pt-4">

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'fieldName' => 'name','title' => 'Name'])

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    <div class="modal fade" role="dialog" id="addNewItem">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add Menu Item</h5>

                    <form action="{{ route('admin.menu_items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row gy-4 pt-4">

                            <input id="menu_id" name="menu_id" />
                            <input id="parent_id" name="parent_id" />
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'label','title' => 'Label'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'url','title' => 'Url'])
                            @include('admin.partials.form.text', ['colSize' => 'col-md-12', 'fieldName' => 'icon','title' => 'Icon'])

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    <div class="modal fade" role="dialog" id="deleteMenu">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-sm text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">{{ "Are You Sure ?" }}</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">Deleting this menu is will auto delete all associated menu items</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <form action="{{ route('admin.menus.delete') }}" method="POST" style="display: inline">
                                    @csrf
                                    <input type="hidden" id="delete_menu_item" name="id" />
                                    <input type="hidden" id="menu_type" name="type" />
                                    <button type="submit" class="btn btn-success">Yes, Delete it</button>
                                </form>
                            </li>
                            <li>
                                <button data-bs-dismiss="modal" class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->


@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        // Handle the click event for the "Edit" button
        $('.add_menu_item').click(function () {
            var itemId = $(this).data('item-id');
            var parentId = $(this).data('parent-id');

            $('#menu_id').val(itemId);
            $('#parent_id').val(parentId);

        });

        $('.delete_menu').click(function () {
            const menuId = $(this).data('menu-id');
            const menuType = $(this).data('menu-type');
            $('#delete_menu_item').val(menuId);
            $('#menu_type').val(menuType);
        });
    </script>

@endsection
