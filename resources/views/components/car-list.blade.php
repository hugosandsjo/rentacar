<div class="car-list">

    <h1 id="car-list-header">Available Cars</h1>
    <ul class="car-grid">

        @foreach ($cars as $car)
            <li class="car-item">
                <div class="car-brand">
                    {{ $car->brand }} {{ $car->model }}
                </div>

                {{ $car->max_passengers }} Seats
                <br>
                <img src="{{ asset($car->image) }}" alt="Car Image" style="max-width: 300px">
                <br>
                <form method="post" action="/bookings">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $startDate }}">
                    <input type="hidden" name="end_date" value="{{ $endDate }}">
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="passengers" value="{{ $passengers }}">
                    <div class="book-car">
                        {{ $car->price }} kr/day
                        <button type="submit">Book this Car</button>
                    </div>
                </form>
            </li>
        @endforeach
    </ul>

</div>
