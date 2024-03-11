<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Rentacar</h1> <a href="{{ url('/logout') }}">LOG OUT</a>
    </nav>
    <h2>Hello, {{ $user->name }}</h2>
    <h3>Your bookings:</h3>

    <section class="your-bookings">
        @foreach ($user->bookings as $booking)
            <div class="car">
                <h2>Booking id: {{ $booking->id }} </h2>
                <h2>{{ $booking->car->pickupLocation->name }} </h2>
                <div class="car-image">
                    <img src="{{ asset($booking->car->image) }}" alt="Car Image">
                </div>
                <div class="car-description">
                    <div>
                        <h4>Booking id: {{ $booking->id }} </h4>
                        <h4>User id: {{ $booking->user_id }} </h4>
                        <h4>Start date: {{ $booking->start_date }} </h4>
                    </div>
                    <div>
                        <h4>Passengers: {{ $booking->passengers }} </h4>
                        <h4>Car: {{ $booking->car_id }} </h4>
                        <h4>End date: {{ $booking->end_date }} </h4>
                    </div>
                </div>
                <div class="button-div">
                    <form method="post" action="/bookings/{{ $booking->id }}/delete">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>

                    <form action="/view-bookings" method="post">
                        @csrf
                        {{-- @method('') --}}
                        <button class="edit-button" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>

    <section class="search-section">

        <div class="search-div">
            <h1>Search availability</h1>
            <p>Lorem ipsum</p>
        </div>

        {{-- Lägg till så man får vällja hur många platser innan så bara bilar med rätt antal säten visas --}}
        <form class="search-form" method="GET" action="{{ route('cars.search') }}">

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>


            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" min="" required>

            <label for="pickup_location">Pickup Location:</label>
            <select id="pickup_location" name="pickup_location">
                @foreach ($pickupLocations as $pickupLocation)
                    <option value="{{ $pickupLocation->id }}">{{ $pickupLocation->name }}</option>
                @endforeach
            </select>


            <label for="passengers">Passengers:</label>
            <input type="number" value="2" max="8" min="1" id="passengers" name="passengers"
                required>

            <button class="search-button" type="submit">Search</button>
        </form>

    </section>


    {{-- skickas till en komponent som bara visas om det finns bilar att visa --}}
    @if (isset($availableCars))
        <x-car-list :pickupLocationId="$pickupLocationId" :cars="$availableCars" :startDate="$startDate" :endDate="$endDate" :passengers="$passengers" />
    @endif


    <script>
        document.getElementById('start_date').addEventListener('change', function() {
            document.getElementById('end_date').min = this.value;
        });
    </script>
</body>

</html>


{{-- <form method="post" action="/bookings">
        @csrf
        <div>
            <label for="start_date">Start date</label>
            <input name="start_date" id="start_date" type="date" />
            <label for="end_date">End date</label>
            <input name="end_date" id="end_date" type="date" />
            <label for="passengers">Number of passengers</label>
            <input name="passengers" id="passengers" type="number" />
            <label for="car_id">Car</label>
            <select name="car_id" id="car_id">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand }}, {{ $car->model }}, Max:
                        {{ $car->max_passengers }}, Price:{{ $car->price }}</option>
                @endforeach
            </select>


        </div>
        <button type="submit">Submit</button>
    </form> --}}
