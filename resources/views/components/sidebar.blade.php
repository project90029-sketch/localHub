<!-- Sidebar Component -->
<aside class="sidebar" id="sidebar">
    @foreach($menuItems as $item)
    <div class="sidebar-item {{ $item['active'] ?? false ? 'active' : '' }}" onclick="navigate('{{ $item['route'] }}')">
        <i class="fas fa-{{ $item['icon'] }}"></i> {{ $item['label'] }}
    </div>
    @endforeach
</aside>