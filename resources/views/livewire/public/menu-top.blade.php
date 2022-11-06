<div>
    <ul class="sf-menu" id="fh5co-primary-menu">
        @if ($menu_top->isNotEmpty())
            @foreach ($menu_top as $item)
                @if (empty($item->parent))
                    <li class="@if(url($item->link) == url()->current()) active @endif">
                        @php
                            $sub_menu = $menu_top->where('parent',$item->id);
                        @endphp
                        <a href="{{ url($item->link) }}" class="fh5co-sub-ddown">{{ $item->title }}</a>
                        @if ($sub_menu->isNotEmpty())
                            <ul class="fh5co-sub-menu">
                                @foreach ($sub_menu as $sub_menu_item)
                                    <li><a href="{{ url($sub_menu_item->link) }}">{{ $sub_menu_item->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
