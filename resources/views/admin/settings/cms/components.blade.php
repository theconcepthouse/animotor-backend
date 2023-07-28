@extends('admin.layout.theme_builder')


@section('content')



    <section class="section faq-section bg-light-primary">
        <div class="container- p-5 pt-0">

            <div class="section-heading" data-aos="fade-down">
                <h2>{{ settings('site_name') }} component builder</h2>
                <p>Build your webpages with our easy component builder</p>
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
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                <br/>
            @endif


            <div class="faq-info">
                @foreach($data as $item)
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faq{{ $loop->index }}" aria-expanded="false">{{ $item->title }}</a>

                    </h4>
                    <div class="mt-4 mb-2">
                        <a class="btn btn-sm btn-success" href="{{ route('admin.setting.component.edit', $item->id) }}">Edit</a>

                        <a class="btn btn-sm btn-warning" href="{{ route('admin.setting.component.duplicate', $item->id) }}">Duplicate</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.setting.component.delete', $item->id) }}">Delete</a>

                    </div>

                    <div id="faq{{ $loop->index }}" class="card-collapse pt-5 pb-4 collapse">

                        @if($item->title != 'Popular services section')

                        {!! $item->content !!}

                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
