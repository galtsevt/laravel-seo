<div class="btn-toolbar mb-2 mb-md-0 d-flex">
    @if(count($breadcrumbs) > 0)
        <nav aria-label="breadcrumb my-auto">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                @foreach($breadcrumbs as $item)
                    <li class="breadcrumb-item">
                        @if($loop->last)
                            {{ $item->getName() }}
                        @else
                            <a href="{{ $item->getUrl() }}">{{ $item->getName() }}</a>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    @endif
</div>
