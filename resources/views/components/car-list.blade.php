<div>
    <h2>Available Cars</h2>
    <ul>
        @foreach ($cars as $car)
            <li>
                Car id:{{ $car->id }}, {{ $car->brand }}, {{ $car->model }}, Max: {{ $car->max_passengers }},
                Price:{{ $car->price }}, <br>
                <img src="{{ asset($car->image) }}" alt="Car Image" style="max-width: 300px">
                <br>
                <form method="post" action="/bookings">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $startDate }}">
                    <input type="hidden" name="end_date" value="{{ $endDate }}">
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="passengers" value="{{ $passengers }}">
                    <button type="submit">Book this Car</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
