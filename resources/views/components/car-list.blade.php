<div>
    <h2>Available Cars</h2>
    <ul>
        @foreach ($cars as $car)
            <li>
                {{ $car->id }}, {{ $car->brand }}, {{ $car->model }}, Max: {{ $car->max_passengers }},
                Price:{{ $car->price }}
                <!-- Button to select car -->
                <form method="post" action="/bookings">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $startDate }}">
                    <input type="hidden" name="end_date" value="{{ $endDate }}">
                    <button type="submit">Book this Car</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
