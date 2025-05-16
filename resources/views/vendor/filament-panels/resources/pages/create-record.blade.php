@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link href="https://cdn.maptiler.com/maptiler-sdk-js/v1.1.2/maptiler-sdk.css" rel="stylesheet" />
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v1.1.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v1.0.0/leaflet-maptilersdk.js"></script>

    <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
    <link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />

    <script>
        function customFunction() {
            const interval = setInterval(() => {
                const mapContainer = document.getElementById('map');
                if (mapContainer) {
                    clearInterval(interval); // Hentikan interval setelah elemen ditemukan

                    var map = new maplibregl.Map({
                        container: 'map',
                        style: 'https://api.maptiler.com/maps/01967aef-9889-7d85-acf3-a62fbbda6152/style.json?key=VexZFSMFkUov8pyYfCBm',
                        zoom: 12,
                        maxZoom:20,
                        maxBounds: [
                            [468.43111038207894, -7.419410514653123],
                            [468.65839004516397, -7.32032896155107]
                        ]
                    });

                    map.on('click', function (e) {
                        document.getElementById('mountedFormComponentActionsData.0.longitude').value = e.lngLat.lng;
                        document.getElementById('mountedFormComponentActionsData.0.longitude').dispatchEvent(new Event('input'));

                        document.getElementById('mountedFormComponentActionsData.0.latitude').value = e.lngLat.lat;
                        document.getElementById('mountedFormComponentActionsData.0.latitude').dispatchEvent(new Event('input'));

                    });
                }

                    map.on('load', function() {
                        map.addControl(new maplibregl.NavigationControl());
                    })
            }, 500);
        }
    </script>
@endpush

<x-filament-panels::page
    @class([
        'fi-resource-create-record-page',
        'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
    ])
>
    <x-filament-panels::form
        id="form"
        :wire:key="$this->getId() . '.forms.' . $this->getFormStatePath()"
        wire:submit="create"
    >
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    <x-filament-panels::page.unsaved-data-changes-alert />
</x-filament-panels::page>



