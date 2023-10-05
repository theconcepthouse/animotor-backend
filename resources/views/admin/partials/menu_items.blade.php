@if($menuItems->count() > 0)
    <ul class="menu-list" style="margin-left: 25px;">
        @foreach($menuItems as $menuItem)
            <li>
                <div class="card card-bordered mt-1">
                    <div class="flex justify-between p-1">
                        <div class="d-flex gap-3">
                            <div class="mr-2">
                                <em class="icon ni ni-capsule"></em>
                            </div>
                            <div class="">{{ $menuItem->label }}</div>
                        </div>
                        <div>
                            <div class="btn-group" aria-label="Basic example">
                                <a data-bs-toggle="modal" data-parent-id="{{ $menuItem->id }}" href="#addNewItem" type="button" class="btn btn-xs btn-outline-info add_menu_item">Add</a>
                                <button type="button" class="btn btn-xs btn-outline-info">Edit</button>
                                <a data-bs-toggle="modal" data-menu-type="menu_item" data-menu-id="{{ $menuItem->id }}" href="#deleteMenu" class="btn btn-xs btn-outline-danger delete_menu">Delete</a>

{{--                                <button type="button" class="btn btn-xs btn-outline-info">Delete</button>--}}
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.partials.menu_items', ['menuItems' => $menuItem->menus])
            </li>
        @endforeach
    </ul>
@endif
