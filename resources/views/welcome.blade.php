<form action="/api/weather" method="GET">
    @csrf
    Enter a city! <input type="text" name="city" required><br>
    <input type="submit" name="submit">
</form>