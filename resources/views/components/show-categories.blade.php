 <div class="col-md-3 pt-5">
    <h4>CATEGORIES</h4>
    <ul>
        @foreach ($categories as $cat)
            <li> {{ $cat->name }} </li>
        @endforeach
    </ul>
</div>