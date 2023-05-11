<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                 @php $page = Request::segments(); @endphp
                <div style="display:flex;">
{{--                    <h1 class="m-0">{{ ucfirst($page[1] ?? $page[0]) }}</h1>--}}
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    @php $segments = ''; @endphp
                    @foreach(Request::segments() as $segment)
                    @php $segment = preg_replace('/[0-9]+/', '', $segment); @endphp
                        {{-- {{ var_dump($words) }} --}}
                        <?php $segments .= '/'.$segment; ?>
                        <li class="breadcrumb-item">
{{--                            <a href="{{ $segments }}">{{ ucfirst($segment) }}</a>--}}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
