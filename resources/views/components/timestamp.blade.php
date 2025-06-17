@props(['tweet'])
<p {{ $attributes->merge(['class' => 'mt-2 text-xs']) }}>
    {{ $tweet->created_at->inApplicationTimezone()->isToday() ? 'Today | ' . $tweet->created_at->inApplicationTimezone()->format('H:i') : ($tweet->created_at->inApplicationTimezone()->isYesterday() ? 'Yesterday | ' . $tweet->created_at->inApplicationTimezone()->format('H:i') : $tweet->created_at->inApplicationTimezone()->format('d-m-Y | H:i')) }}
</p>