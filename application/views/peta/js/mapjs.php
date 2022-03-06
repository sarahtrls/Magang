<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

	<script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet-search/src/leaflet-search.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
	<script src="<?=base_url('assets/kawasan_konservasi_1.js')?>"></script>


   <script type="text/javascript">

   	var map = L.map('map').setView([-0.2380395, 121.2688475], 5);
		
	
	function popUp(f,l){
	    var html = '';
			
			if (f.properties){
	
					html+='<p style="text-align:left">Nama Satwa : '+f.properties['local']+'<br>';
					html+='<p style="text-align:left;font-style:italic">Nama Latin : '+f.properties['latin']+'<br>';
					html+='<p style="text-align:left"> Nama Lain : '+f.properties['nama_lain']+'<br>';
					html+='<p style="text-align:left">Status IUCN : '+f.properties['IUCN']+'<br>';
					html+='<p style="text-align:left">Rujukan Peta : '+f.properties['rujukan_peta']+'<br>';
					html+='<p style="text-align:left">Kontak : '+f.properties['kontak']+'<br>';
					html+= '<p style="text-align:left;color:white"><a href="<?=assets('unggah/pdf/')?>'+f.properties['file_pdf']+'"  class="btn btn-outline-info btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Lihat PDF </a></p>'

		}
		

		l.bindPopup(html);
	}

	function popUp1(f,l){
	    var html = '';
			
			if (f.properties){
				html+='<p style="text-align:left;margin-bottom:1px">'+f.properties['nama']+'</td>';
				// html+= '<p style="text-align:left;color:white"><a href="<?=site_url('daftar')?>" class="btn btn-outline-info btn-sm" ><i class="fa fa-info" aria-hidden="true"></i> Lihat Informasi </a></p>'

		}
		l.bindPopup(html);
	}

	// legend

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.amenity,
				html: iconByName(feature.amenity),
				iconUrl: '../images/markers/'+feature.amenity+'.png',
				iconSize: [30, 50],
				iconAnchor: [30, 100],
				popupAnchor: [1, -90]
			})
		});
	}

	<?php
		$getdatapeta=$this->Model->get();
		foreach ($getdatapeta->result() as $row) {
			?>

			var myStyle<?=$row->id_peta?> = {
			    "color": "<?=$row->warna?>",
			    "weight": 3,
			    "opacity": 1,
				"fill":true,
				"fillOpacity":0
			};

			<?php
			$arraysatwa[]='{
			active :false,
			name: "'.$row->nama_satwa.'",
			icon: iconByName("'.$row->warna.'"),
			layer: new L.GeoJSON.AJAX(["../assets/unggah/geojson/'.$row->file_geojson.'"],{onEachFeature:popUp,style: myStyle'.$row->id_peta.',pointToLayer: featureToMarker })
			}';
		}
	?>
	
	
		var myStyleKonservasi = {
			"color": "#EB01FA",
			"weight": 1,
			"fillOpacity":0
		};

	var overLayers = [ 
		{
			group : "Kawasan Konservasi",
			layers : [
				{
					active:true,
					name:"Konservasi",
					layer:L.geoJson(json_kawasan_konservasi_1, {
						onEachFeature:popUp1,
						style: myStyleKonservasi
					})
					
				}
			
		]
		},
		{
			group : "Layer Satwa",
			layers : [
			<?=implode(',', $arraysatwa);?>
		]
		}
		

		
		 
	];

	var baseLayers = [
		{
			group:"Layer Peta",
			layers:[
				{
					name: "Default",
					layer: L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
					attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
					}).addTo(map)
    		
				},
				{
					name: "Open Street Map",
					layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
					})
				},
				{
					name: "Cycle OSM",
					layer: L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {maxZoom: 20,
					attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
					})
				}
				
			]
			
		}
		
	];
	


	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true,
	});

	map.addControl(panelLayers);

</script>	