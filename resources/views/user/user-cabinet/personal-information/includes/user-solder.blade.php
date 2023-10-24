<div class="personal-info-right-side__profession-section">
    <span class="personal-info-right-side__label">Професія: </span>
    <input disabled class="personal-info-right-side__field content-title__field" name="profession"
           value="{{auth()->user()->solder->profession ?? null}}" placeholder="Відсутня інформація">
    @error("profession")
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="personal-info-right-side__area-section">
    <span class="personal-info-right-side__label">Область роботи: </span>
    <select disabled class="personal-info-right-side__field content-title__field" name="area">
        <option>----Обреріть один пункт----</option>
        <option @selected(auth()->user()->solder->area ?? null && auth()->user()->solder->area == 1) value="1">
            Реставрація антикваріату
        </option>
        <option @selected(auth()->user()->solder->area ?? null && auth()->user()->solder->area == 2) value="2">
            Ремонт антикваріату
        </option>
    </select>
    @error("area")
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>


