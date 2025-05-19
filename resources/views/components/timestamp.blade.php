@props(['tweet'])
<p {{ $attributes->merge(['class' => 'mt-2 text-xs']) }}>
    {{ $tweet->created_at->isToday() ? 'Today | ' . $tweet->created_at->format('H:i') : ($tweet->created_at->isYesterday() ? 'Yesterday | ' . $tweet->created_at->format('H:i') : $tweet->created_at->format('d-m-Y | H:i')) }}
</p>