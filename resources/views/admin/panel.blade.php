
<div class="admin-panel">
    <div class="admin-panel-image">

        <div class="dropdown">
            <img style="border-radius: 20px " id="dropdownMenuButton1" data-bs-toggle="dropdown"
                 aria-expanded="false" src={{"/img/settings.png"}} alt="" width="100px">

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/admin/panel">Go to admin panel</a></li>
            </ul>
        </div>

    </div>
    <div class = "panel-element">
        <div>{{Auth::user()->name}}</div>
    </div>
    <div class = "panel-element">edit page</div>
    <div class = "panel-element"> do something</div>
    <div class = "panel-element">delete stuff</div>
{{--    <div class = "panel-element"></div>--}}
</div>

