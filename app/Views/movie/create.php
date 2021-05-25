<div class="container" style="margin-top: 24px">
    <form action="/movie/create" method="post">
        <div class="form-group"><label for="movieName">movieName:</label>
            <input type="text" id="movieName" name="movieName">
        </div>
        <div class="form-group"><label for="director">director:</label>
            <input type="text" id="director" name="director">
        </div>
        <div class="form-group"><label for="actors">actors:</label>
            <input type="text" id="actors" name="actors">
        </div>
        <div class="form-group"><label for="genre">genre:</label>
            <input type="text" id="genre" name="genre">
        </div>
        <div class="form-group"> <label for="duration">duration:</label>
            <input type="text" id="duration" name="duration">
        </div>
        <div class="form-group"> <label for="premiereDate">premiereDate:</label>
            <input type="date" id="premiereDate" name="premiereDate">
        </div>
        <div class="form-group"><label for="language">language:</label>
            <input type="text" id="language" name="language">
        </div>
        <div class="form-group"><label for="image">image:</label>
            <input type="text" id="image" name="image">
        </div>
        <button class="btn-btn-primary" type="submit">Submit</button>
    </form>
</div>