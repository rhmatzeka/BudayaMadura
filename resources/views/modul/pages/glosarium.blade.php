@php
    $firstGlosarium = \App\Models\Glossarium::orderBy('istilah')->first();
@endphp

@if($firstGlosarium)
    <script>
        window.location.href = "{{ route('glossarium.show', $firstGlosarium->id) }}";
    </script>
@else
    <div class="text-center">
        <h2 style="color: var(--dark-brown);">Glosarium</h2>
        <p>Belum ada data glosarium</p>
    </div>
@endif