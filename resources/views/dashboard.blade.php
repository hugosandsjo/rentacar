<html>

<body>
    <h1>Hello, {{ $user->name }}</h1>

    <a href="{{ url('/logout') }}">LOG OUT</a>

    <ul>
        @foreach ($user->bookings as $booking)
            <li>{{ $booking->id }}, {{ $booking->user_id }}, {{ $booking->start_date }}, {{ $booking->end_date }},
                {{ $booking->passengers }}, {{ $booking->car_id }}</li>
        @endforeach
    </ul>


    <form method="post" action="/bookings">
        @csrf
        <div>
            <label for="start_date">Start date</label>
            <input name="start_date" id="start_date" type="date" />
            <label for="end_date">End date</label>
            <input name="end_date" id="end_date" type="date" />
            <label for="passengers">Number of passengers</label>
            <input name="passengers" id="passengers" type="number" />
            <label for="car_id">Car</label>
            <input name="car_id" id="car_id" type="number" />


        </div>
        <button type="submit">Submit</button>
    </form>


</body>

</html>
