var wms_layers = [];
var baseLayer = new ol.layer.Group({
    'title': '',
    layers: [
new ol.layer.Tile({
    'title': 'OSM',
    'type': 'base',
    source: new ol.source.OSM()
})
]
});
var format_dukuhbaru_0 = new ol.format.GeoJSON();
var features_dukuhbaru_0 = format_dukuhbaru_0.readFeatures(json_dukuhbaru_0, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_dukuhbaru_0 = new ol.source.Vector({
    attributions: [new ol.Attribution({html: '<a href=""></a>'})],
});
jsonSource_dukuhbaru_0.addFeatures(features_dukuhbaru_0);var lyr_dukuhbaru_0 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_dukuhbaru_0, 
                style: style_dukuhbaru_0,
    title: 'dukuhbaru<br />\
    <img src="styles/legend/dukuhbaru_0_0.png" /> Gendongan<br />\
    <img src="styles/legend/dukuhbaru_0_1.png" /> Kedu<br />\
    <img src="styles/legend/dukuhbaru_0_2.png" /> Madaran<br />\
    <img src="styles/legend/dukuhbaru_0_3.png" /> Puri<br />'
        });var format_wisata_1 = new ol.format.GeoJSON();
var features_wisata_1 = format_wisata_1.readFeatures(json_wisata_1, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_wisata_1 = new ol.source.Vector({
    attributions: [new ol.Attribution({html: '<a href=""></a>'})],
});
jsonSource_wisata_1.addFeatures(features_wisata_1);var lyr_wisata_1 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_wisata_1, 
                style: style_wisata_1,
                title: '<img src="styles/legend/wisata_1.png" /> wisata'
            });

lyr_dukuhbaru_0.setVisible(true);lyr_wisata_1.setVisible(true);
var layersList = [baseLayer,lyr_dukuhbaru_0,lyr_wisata_1];
lyr_dukuhbaru_0.set('fieldAliases', {'Dukuh': 'Dukuh', 'Wisata': 'Wisata', });
lyr_wisata_1.set('fieldAliases', {'Wisata': 'Wisata', 'Alamat': 'Alamat', });
lyr_dukuhbaru_0.set('fieldImages', {'Dukuh': 'TextEdit', 'Wisata': 'TextEdit', });
lyr_wisata_1.set('fieldImages', {'Wisata': 'TextEdit', 'Alamat': 'TextEdit', });
lyr_dukuhbaru_0.set('fieldLabels', {'Dukuh': 'inline label', 'Wisata': 'header label', });
lyr_wisata_1.set('fieldLabels', {'Wisata': 'inline label', 'Alamat': 'header label', });
lyr_wisata_1.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});