<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link href="https://cdn.maptiler.com/maptiler-sdk-js/v1.1.2/maptiler-sdk.css" rel="stylesheet" />
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v1.1.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v1.0.0/leaflet-maptilersdk.js"></script>

    <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
    <link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
        html, body, .fi-main {
            padding: 0px;
            margin: 0px;
        }

        #map {
            height: 100%;
            width: 100vw;
            z-index: 0;
        }
    </style>

<div id="map" class="h-screen w-screen"></div>

<script>
$(document).ready(function() { 

  const map = new maplibregl.Map({
    container: 'map',
    style: 'https://api.maptiler.com/maps/01967aef-9889-7d85-acf3-a62fbbda6152/style.json?key=VexZFSMFkUov8pyYfCBm',
    center: [468.54131698608404, -7.369957629936546],
    zoom: 12,
    maxZoom:20,
    maxBounds: [
      [468.43111038207894, -7.419410514653123],
      [468.65839004516397, -7.32032896155107]
    ]
  });

  // map.on('click', function (e) {
  //   alert(`Koordinat: ${e.lngLat.lng}, ${e.lngLat.lat}`);
  // });

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
                  "line-color": "hsl(0, 0%, 36%)"
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
                  "line-color": "hsl(0, 0%, 19%)"
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

      fetch('/api/laporan')
          .then(response => response.json())
          .then(data => {
              console.log(data);
              map.addSource('geojson', {
                  type: 'geojson',
                  data: data
              });

              map.addLayer(
                {
                "id": "Laporan",
                "type": "symbol",
                "source": "geojson",
                "layout": {
                  "text-field": [
                    "get",
                    "name"
                  ],
                  "text-font": [
                    "Noto Sans Regular"
                  ],
                  "visibility": "visible",
                  "icon-image": "construction",
                  "icon-anchor": "bottom",
                  "text-anchor": "top",
                  "icon-size": 1.5
                },
                "paint": {
                  "text-color": "hsl(0, 100%, 50%)",
                  "icon-color": "hsl(0, 100%, 50%)",
                  "icon-halo-color": "rgba(255, 255, 255, 1)",
                  "icon-halo-width": 1
                },
                "filter": [
                  "==",
                  [
                    "geometry-type"
                  ],
                  "Point"
                ]
              }
              );
          });

          
  });

  // const popup = new maplibregl.Popup({
  //   closeButton: false,
  //   closeOnClick: false
  // });

  map.on('mouseenter', 'Laporan', function (e) {
    // Ubah cursor jadi pointer
    map.getCanvas().style.cursor = 'pointer';

    // // Ambil data dari properties
    // const coordinates = e.features[0].geometry.coordinates.slice();
    // const props = e.features[0].properties;

    // popup
    //     .setLngLat(coordinates)
    //     .setHTML(`<strong>${props.id}</strong>`)
    //     .addTo(map)
    //     .getElement().style.color = 'hsl(0, 100%, 50%)';
  });

  map.on('mouseleave', 'Laporan', function () {
      map.getCanvas().style.cursor = '';
      // popup.remove();
  });

  map.on('click', 'Laporan', function (e) {
      const coordinates = e.features[0].geometry.coordinates.slice();
      const props = e.features[0].properties;
      const id = props.id;  
      
      const redirectUrl = `/admin/laporan/${id}`;  

      // Redirect ke URL yang dituju
      window.location.href = redirectUrl;
  });

  map.addControl(new maplibregl.NavigationControl());
  map.dragRotate.enable();
  map.touchZoomRotate.enableRotation();
});
</script>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
