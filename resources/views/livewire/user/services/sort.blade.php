<form method="get">
    <select onchange="this.form.submit()" name="sort">
        <option {{ request('sort') === 'asc' ? 'selected' : '' }} value="asc">Сортувати за зростанням ціни</option>
        <option {{ request('sort') === 'desc' ? 'selected' : '' }} value="desc">Сортувати за спаданням ціни</option>
    </select>
</form>
