 // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      function initMap() {

        // some lot entrances are commented out due to not being used at this time.
        var lotKK = {lat: 33.794404,lng: -79.007915};
        // var lotKK2 = {lat: 33.791844,lng: -79.010199};
        var lotQQ = {lat: 33.792231,lng:  -79.015520};
        // var lotQQ2 = {lat: 33.792237,lng: -79.016255};
        var lotG = {lat: 33.793686,lng:  -79.009909};
        var lotHH = {lat: 33.796874,lng:  -79.009464};
        // var lotHH2 = {lat: 33.797620,lng:  -79.010206};
        var lotBB = {lat: 33.799678,lng:  -79.012966};
        var lotDD = {lat: 33.799320,lng:  -79.013819};
        // var lotEE2 = {lat:33.800034,lng:  -79.012431};
        var lotEE = {lat: 33.797983,lng:  -79.010578};
        var lotAA = {lat: 33.798344,lng:  -79.016367};
        // var lotAA2 = {lat: 33.799501,lng:  -79.016179};
        var lotGG = {lat: 33.796556, lng: -79.006727};

        // var lotGG2 = {lat: 33.796096, lng: -79.007530};
        // var lotGG3 = {lat: 33.796808, lng: -79.008308};        

        // As we expand to more lots, more markers will open up
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        // var lotA = {lat: ,lng: };
        //
        //Set scrolling bounds for viewing on the map
        //
        // var strictBounds = new google.maps.LatLngBounds(
        //   new google.maps.LatLng(33.781755, -79.026981),
        //   new google.maps.LatLng(33.801691, -78.988061)
        //   );
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 33.7950, lng: -79.0117},
          // //prevents zooming with +/- buttons
          // zoomControl: false,
          // //prevents zooming by double-left-clicking
          // disableDoubleClickZoom: true,
          // //prevents scrolling with mouse
          // scrollwheel: false,
          // //disable street view 
          streetViewControl: false,
          minZoom:15,
          maxZoom:18,

          center: {lat: 33.7950, lng: -79.0117},
          mapTypeControl: true,
          mapTypeConrolOptions:{
          style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
          mapTypeIds: ['map','satellite']
          },

          //zoom with best view of campus parkinglots
          zoom: 16
        });
        // Info window information
        var infoWindowArray = new Array();
        function clear(){
          for (var i=0;i<infoWindowArray.length;i++){
            infoWindowArray[i].close();
          }
          return;
        }
        var gglotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot GG</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(gglotinfo);
        var hhlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot HH</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(hhlotinfo);
        var eelotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot EE</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(eelotinfo);
        var bblotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot BB</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(bblotinfo);
        var ddlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot DD</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(ddlotinfo);
        var aalotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot AA</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(aalotinfo);
        var kklotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot KK</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(kklotinfo);
        var glotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot G</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(glotinfo);
        var qqlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot QQ</h2><br><p>Here is our database output for this lot.</p>'
        });
        infoWindowArray.push(qqlotinfo);

        // making the markers
        // and adding their corresponding listeners

        var markerGG = new google.maps.Marker({
          position: lotGG,
          map: map,
          icon: 'img/all_student_parking.png',
          title: 'Lot GG'
        });
        markerGG.addListener('click', function(){
          clear();
          gglotinfo.open(map,markerGG);
        });
        // var markerGG2 = new google.maps.Marker({
        //   position: lotGG2,
        //   map: map,
        //   icon: 'img/all_student_parking.png',
        //   title: 'Lot GG'
        // });
        // markerGG2.addListener('click', function(){
        //   clear();
        //   gglotinfo.open(map,markerGG2);
        // });
        // var markerGG3 = new google.maps.Marker({
        //   position: lotGG3,
        //   map: map,
        //   icon: 'img/all_student_parking.png',
        //   title: 'Lot GG'
        // });
        // markerGG3.addListener('click', function(){
        //   clear();
        //   gglotinfo.open(map,markerGG3);
        // });
        var markerKK = new google.maps.Marker({
          position: lotKK,
          map: map,
          icon: 'img/commuter_parking.png',
          title: 'Lot KK'
        });
        markerKK.addListener('click', function(){
          clear();
          kklotinfo.open(map,markerKK);
        });
        // var markerKK2 = new google.maps.Marker({
        //   position: lotKK2,
        //   map: map,
        //   icon: 'img/commuter_parking.png',
        //   title: 'Lot KK'
        // });
        // markerKK2.addListener('click', function(){
        //   clear();
        //   kklotinfo.open(map,markerKK2);
        // });
        var markerG = new google.maps.Marker({
          position: lotG,
          map: map,
          icon: 'img/commuter_parking.png',
          title: 'Lot G'
        });
        markerG.addListener('click', function(){
          clear();
          glotinfo.open(map,markerG);
        });
        var markerQQ = new google.maps.Marker({
          position: lotQQ,
          map: map,
          icon: 'img/commuter_parking.png',
          title: 'Lot QQ'
        });
        markerQQ.addListener('click', function(){
          clear();
          qqlotinfo.open(map,markerQQ);
        });
        // var markerQQ2 = new google.maps.Marker({
        //   position: lotQQ2,
        //   map: map,
        //   icon: 'img/commuter_parking.png',
        //   title: 'Lot QQ'
        // });
        // markerQQ2.addListener('click', function(){
        //   clear();
        //   qqlotinfo.open(map,markerQQ2);
        // });
        var markerDD = new google.maps.Marker({
          position: lotDD,
          map: map,
          icon: 'img/res_parking.png',
          title: 'Lot DD'
        });
        markerDD.addListener('click', function(){
          clear();
          ddlotinfo.open(map,markerDD);
        });
        var markerBB = new google.maps.Marker({
          position: lotBB,
          map: map,
          icon: 'img/res_parking.png',
          title: 'Lot BB'
        });
        markerBB.addListener('click', function(){
          clear();
          bblotinfo.open(map,markerBB);
        });
        var markerHH = new google.maps.Marker({
          position: lotHH,
          map: map,
          icon: 'img/res_parking.png',
          title: 'Lot HH'
        });
        markerHH.addListener('click', function(){
          clear();
          hhlotinfo.open(map,markerHH);
        });
        // var markerHH2 = new google.maps.Marker({
        //   position: lotHH2,
        //   map: map,
        //   icon: 'img/res_parking.png',
        //   title: 'Lot HH'
        // });
        // markerHH2.addListener('click', function(){
        //   clear();
        //   hhlotinfo.open(map,markerHH2);
        // });
        var markerAA = new google.maps.Marker({
          position: lotAA,
          map: map,
          icon: 'img/commuter_parking.png',
          title: 'Lot AA'
        });
        markerAA.addListener('click', function(){
          clear();
          aalotinfo.open(map,markerAA);
        });
        // var markerAA2 = new google.maps.Marker({
        //   position: lotAA2,
        //   map: map,
        //   icon: 'img/commuter_parking.png',
        //   title: 'Lot AA'
        // });
        // markerAA2.addListener('click', function(){
        //   clear();
        //   aalotinfo.open(map,markerAA2);
        // });
        var markerEE = new google.maps.Marker({
          position: lotEE,
          map: map,
          icon: 'img/res_parking.png',
          title: 'Lot EE'
        });
        markerEE.addListener('click', function(){
          clear();
          eelotinfo.open(map,markerEE);
        });
        // var markerEE2 = new google.maps.Marker({
        //   position: lotEE2,
        //   map: map,
        //   icon: 'img/res_parking.png',
        //   title: 'Lot EE'
        // });
        // markerEE2.addListener('click', function(){
        //   clear();
        //   eelotinfo.open(map,markerEE2);
        // });
        // Try HTML5 geolocation.
        // Geolocation is what finds your current location. Must be approved in browser.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
