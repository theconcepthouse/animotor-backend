@extends('admin.layout.app')

@section('title', 'Permissions')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">{{  $model ? "Edit {$type}" : "New {$type}" }}</h4>
                                    </div>

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div class="flex flex-col">
                                        <div class="my-2 py-2 p-4 overflow-x-auto">
                                            <form
                                                x-data="laratrustForm()"
                                                x-init="{!! $model ? '' : '$watch(\'displayName\', value => onChangeDisplayName(value))'!!}"
                                                method="POST"
                                                action="{{$model ? route("laratrust.{$type}s.update", $model->getKey()) : route("laratrust.{$type}s.store")}}"
                                                class=""
                                            >
                                                @csrf
                                                @if ($model)
                                                    @method('PUT')
                                                @endif

                                                <div class="row gy-4 pt-4">

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $model->name, 'fieldName' => 'name','title' => 'Name'])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $model->display_name, 'fieldName' => 'display_name','title' => 'Display Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $model->description, 'fieldName' => 'description','title' => 'Description'])


                                                </div>

                                                @if($type == 'role')
                                                    <div class="row" style="margin-top: 30px">
                                                        <h3 class="block text-gray-700">Permissions</h3>
                                                        <div class="flex flex-wrap justify-start mb-4">
                                                            @foreach ($permissions as $permission)
                                                                <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                                                                    <input
                                                                        type="checkbox"
                                                                        class="form-checkbox h-4 w-4"
                                                                        name="permissions[]"
                                                                        value="{{$permission->getKey()}}"
                                                                        {!! $permission->assigned ? 'checked' : '' !!}
                                                                    >
                                                                    <span class="ml-2">{{$permission->display_name ?? $permission->name}}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>

                                                    </div>

                                                @endif
                                                <div class="flex justify-end">
                                                    <a
                                                        href="{{ route('admin.roles.index') }}"
                                                        class="btn btn-danger mr-4 mx-4"
                                                    >
                                                        Cancel
                                                    </a>
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <script>
                                        window.laratrustForm =  function() {
                                            return {
                                                displayName: '{{ $model->display_name ?? old('display_name') }}',
                                                name: '{{ $model->name ?? old('name') }}',
                                                toKebabCase(str) {
                                                    return str &&
                                                        str
                                                            .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
                                                            .map(x => x.toLowerCase())
                                                            .join('-')
                                                            .trim();
                                                },
                                                onChangeDisplayName(value) {
                                                    this.name = this.toKebabCase(value);
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
