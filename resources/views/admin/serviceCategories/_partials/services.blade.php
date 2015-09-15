<h2>Forms</h2>

<ul>
@foreach($services as $service)
            <li>
                {!! link_to_route('admin.services.edit', $service->name, array($service->id)) !!}
            </li>
@endforeach

</ul>

