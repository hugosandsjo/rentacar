<html>

<body>
    <h1>Hello, {{ $user->name }}</h1>

    <a href="{{ url('/logout') }}">LOG OUT</a>

    <ul>
        @foreach ($user->bookings as $booking)
            <li>booking id:{{ $booking->id }}, user id:{{ $booking->user_id }}, {{ $booking->start_date }},
                {{ $booking->end_date }},
                passagerare: {{ $booking->passengers }},bil: {{ $booking->car_id }}</li>

            <form method="post" action="/bookings/{{ $booking->id }}/delete">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>

            <form action="/bookings/{{ $booking->id }}" method="POST">

                <button type="submit">Edit</button>
            </form>
        @endforeach
    </ul>



    {{-- Lägg till så man får vällja hur många platser innan så bara bilar med rätt antal säten visas --}}
    <form method="GET" action="{{ route('cars.search') }}">

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Search</button>
    </form>




    {{-- skickas till en komponent som bara visas om det finns bilar att visa --}}
    @if (isset($availableCars))
        <x-car-list :cars="$availableCars" :startDate="$startDate" :endDate="$endDate" />
    @endif





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
