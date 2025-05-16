<x-template>
    <div class="flex w-full" >
        <div id="map" class="h-96 w-full rounded-md"></div>
    </div>
    <script>
          const map = new maplibregl.Map({
            container: 'map',
            style: 'https://api.maptiler.com/maps/01967aef-9889-7d85-acf3-a62fbbda6152/style.json?key=VexZFSMFkUov8pyYfCBm',
            pitch: 45,  // Set the fixed tilt to 45 degrees
            bearing: 0, // Set the initial bearing (rotation)
            dragRotate: true,      // Disable map rotation with dragging
            dragPan: false,         // Disable dragging (panning)
            touchZoomRotate: false, // Disable touch zoom and rotation
            touchPitch: false,      // Disable touch pitch changes
            touchZoom: false,       // Disable touch zooming
            scrollZoom: false,      // Disable scroll wheel zooming
            doubleClickZoom: false, // Disable double-click zooming
            boxZoom: false,         // Disable box zooming
            keyboard: false,        // Disable keyboard navigation
            attributionControl: false, // Disable the attribution control
            zoom: 18,
            maxZoom:20,
            maxBounds: [
                    [468.43111038207894, -7.419410514653123],
                    [468.65839004516397, -7.32032896155107]
            ]
          });
    
            map.on('load', function () {
                fetch('/api/geodata')
                    .then(response => response.json())
                    .then(data => {
                        map.addSource('geodata', {
                            type: 'geojson',
                            data: data
                        });

                        map.addLayer({
                            "id": "outline-layer",
                            "type": "line",
                            "source": "geodata",
                            "minzoom": 8,
                            "maxzoom": 21,
                            "layout": {
                            "line-join": "round",
                            "line-cap": "round",
                            "visibility": "visible"
                            },
                            "paint": {
                            "line-width": [
                                "interpolate",
                                ["linear"],
                                ["zoom"],
                                12.1,
                                0,
                                15.3,
                                4,
                                17.3,
                                9,
                                18.6,
                                12,
                                22,
                                19
                            ],
                            "line-color": "hsl(43, 96%, 56%)"
                            }
                        }, 'Minor road');

                        map.addLayer({
                            "id": "line-layer",
                            "type": "line",
                            "source": "geodata",
                            "minzoom": 8,
                            "maxzoom": 21,
                            "layout": {
                            "line-join": "round",
                            "line-cap": "round",
                            },
                            "paint": {
                            "line-width": [
                                "interpolate",
                                ["linear"],
                                ["zoom"],
                                12.1,
                                0,
                                15.3,
                                3,
                                17.3,
                                8,
                                18.6,
                                10,
                                22,
                                17
                            ],
                            "line-color": "hsl(56, 42%, 25%)"
                            }
                        }, 'Minor road');

                        map.addLayer(
                            {
                            "id": "label-layer",
                            "type": "symbol",
                            "source": "geodata",
                            "minzoom": 8,
                            "layout": {
                                "icon-allow-overlap": false,
                                "icon-ignore-placement": false,
                                "icon-keep-upright": false,
                                "symbol-placement": "line",
                                "symbol-spacing": [
                                "step",
                                [
                                    "zoom"
                                ],
                                250,
                                21,
                                1000
                                ],
                                "text-allow-overlap": false,
                                "text-anchor": "center",
                                "text-field": [
                                "get",
                                "name"
                                ],
                                "text-font": [
                                "Roboto Regular",
                                "Noto Sans Regular"
                                ],
                                "text-ignore-placement": false,
                                "text-justify": "center",
                                "text-max-width": 10,
                                "text-offset": [
                                0,
                                0.15
                                ],
                                "text-optional": false,
                                "text-size": {
                                "stops": [
                                    [
                                    13,
                                    10
                                    ],
                                    [
                                    14,
                                    11
                                    ],
                                    [
                                    18,
                                    13
                                    ],
                                    [
                                    22,
                                    15
                                    ]
                                ]
                                },
                                "visibility": "visible"
                            },
                            "paint": {
                                "icon-color": "hsl(0, 0%, 69%)",
                                "icon-halo-blur": 0.5,
                                "icon-halo-color": "hsl(0, 0%, 0%)",
                                "icon-halo-width": 1,
                                "text-color": "hsl(0, 0%, 69%)",
                                "text-halo-blur": 0.5,
                                "text-halo-color": "hsl(0, 0%, 0%)",
                                "text-halo-width": 1
                            },
                            "metadata": {},
                            "filter": [
                                "all",
                                [
                                "!in",
                                "subclass",
                                "gondola",
                                "cable_car"
                                ],
                                [
                                "!in",
                                "class",
                                "ferry",
                                "service"
                                ]
                            ]
                            }
                        );
                    });
            });



    </script>
</x-template>