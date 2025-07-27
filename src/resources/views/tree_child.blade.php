<ul>
    @foreach ($tree as $key => $node)
        @if ($node['induk'] === $parent)
            <li>
                {{ $node['nama'] }}
                @include('tree_child', ['tree' => $tree, 'parent' => $key])
            </li>
        @endif
    @endforeach
</ul>
