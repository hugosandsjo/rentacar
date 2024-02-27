<form method="POST" action="{{ url('bookings/' . $booking->id) }}">
    @csrf
    @method('PUT')

    <label for="start_date">Start date:</label>
    <input type="date" id="start_date" name="start_date" value="{{ $booking->start_date }}">

    <label for="end_date">End date:</label>
    <input type="date" id="end_date" name="end_date" value="{{ $booking->end_date }}">

    <label for="passengers">Passengers:</label>
    <input type="number" id="passengers" name="passengers" value="{{ $booking->passengers }}">

    <label for="car_id">Car ID:</label>
    <input type="number" id="car_id" name="car_id" value="{{ $booking->car_id }}">

    <button type="submit">Update Booking</button>
</form>
