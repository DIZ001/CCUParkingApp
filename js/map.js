 // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var positionArray = new Array();
      function initMap() {

        //For GPS functionality

        var directionsService = new google.maps.DirectionsService;        
        var directionsDisplay = new google.maps.DirectionsRenderer;
        // some lot entrances are commented out due to not being used at this time.

        var lotArray = new Array();

        var lotG = {name: 'lotG', lat: 33.793686,lng:  -79.009909};
        lotArray.push(lotG);
        var lotM = {name: 'lotM', lat: 33.793648,lng: -79.012604};
        lotArray.push(lotM);
        var lotAA = {name: 'lotAA', lat: 33.798344,lng:  -79.016367};
        lotArray.push(lotAA);
        var lotBB = {name: 'lotBB', lat: 33.799678,lng:  -79.012966};
        lotArray.push(lotBB);
        var lotDD = {name: 'lotDD', lat: 33.799320,lng:  -79.013819};
        lotArray.push(lotDD);
        // var lotEE2 = {lat:33.800034,lng:  -79.012431};
        var lotEE = {name: 'lotEE', lat: 33.797983,lng:  -79.010578};
        lotArray.push(lotEE);
        var lotGG = {name: 'lotGG', lat: 33.796556, lng: -79.006727};
        lotArray.push(lotGG);
        var lotHH = {name: 'lotHH', lat: 33.796874,lng:  -79.009464};
        lotArray.push(lotHH);
        var lotKK = {name: 'lotKK', lat: 33.794404,lng: -79.007915};
        lotArray.push(lotKK);
        var lotNN = {name: 'lotNN', lat:33.791118 ,lng: -79.012559};
        lotArray.push(lotNN);
        // var lotAA2 = {lat: 33.799501,lng:  -79.016179};
        var lotQQ = {name: 'lotQQ', lat: 33.792231,lng:  -79.015520};
        lotArray.push(lotQQ);
        var lotYY = {name: 'lotYY', lat: 33.786320,lng: -79.020229};
        lotArray.push(lotYY);
        var lotDDD = {name: 'lotDDD', lat: 33.800601,lng: -78.998891};
        lotArray.push(lotDDD);
        var lotArraySize = lotArray.length;

        // var lotKK2 = {lat: 33.791844,lng: -79.010199};
 
        // var lotQQ2 = {lat: 33.792237,lng: -79.016255};
        
        
        // var lotHH2 = {lat: 33.797620,lng:  -79.010206};
        

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
        //
        //Set scrolling bounds for viewing on the map
        //
        // var strictBounds = new google.maps.LatLngBounds(
        //   new google.maps.LatLng(33.781755, -79.026981),
        //   new google.maps.LatLng(33.801691, -78.988061)
        //   );
        var map = new google.maps.Map(document.getElementById('map'), {


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
          zoom: 14
        });
        directionsDisplay.setMap(map);
        // calculateAndDisplayRoute(directionsService,directionsDisplay,lotArray);
        // document.getElementById('mode').addEventListener('change',
        //   function(lotArray){
        //   calculateAndDisplayRoute(directionsService,directionsDisplay, lotArray);
        // })
        

        // var onClickHandler = function(){
        //   directionsHere(directionsService,directionsDisplay,lotArray);
        // }
        // document.getElementById('dirTo').addEventListener('click',function(){
        //   directionsHere(directionsService,directionsDisplay,lotArray);
        // });
        
        var spots = 500;
        var totalSpots = 1000;
        // info windows
        var infoWindowArray = new Array();
        var gglotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot GG</h2><br><p> '+spots+'/'+totalSpots+' capacity.</p>'
        });
        infoWindowArray.push(gglotinfo);
        var dddlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot DDD</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(dddlotinfo);

        var hhlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot HH</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(hhlotinfo);

        var eelotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot EE</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(eelotinfo);

        var bblotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot BB</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(bblotinfo);

        var ddlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot DD</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(ddlotinfo);

        var aalotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot AA</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(aalotinfo);

        var kklotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot KK</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(kklotinfo);

        var glotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot G</h2><br><p>  '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(glotinfo);

        var qqlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot QQ</h2><br><p>  '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(qqlotinfo);

        var mlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot M</h2><br><p>  '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(mlotinfo);

        var yylotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot YY</h2><br><p> '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(yylotinfo);

        var nnlotinfo = new google.maps.InfoWindow({
          content: '<h2>Lot NN</h2><br><p>  '+spots+'/'+totalSpots+' capacity</p>'
        });
        infoWindowArray.push(nnlotinfo);
        // making the markers
        // and adding their corresponding listeners

        // Markers
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
        var markerDDD = new google.maps.Marker({
          position: lotDDD,
          map: map,
          icon: 'img/all_student_parking.png',
          title: 'Lot DDD'
        });
        markerDDD.addListener('click', function(){
          clear();
          dddlotinfo.open(map,markerDDD);
        });

        var markerM = new google.maps.Marker({
          position: lotM,
          map: map,
          icon: 'img/commuter_parking.png',
          title: 'Lot M'
        });
        markerM.addListener('click', function(){
          clear();
          mlotinfo.open(map,markerM);
        });

        var markerYY = new google.maps.Marker({
          position: lotYY,
          map: map,
          icon: 'img/all_student_parking.png',
          title: 'Lot YY'
        });
        markerYY.addListener('click', function(){
          clear();
          yylotinfo.open(map,markerYY);
        });

        var markerNN = new google.maps.Marker({
          position: lotNN,
          map: map,
          icon: 'img/res_parking.png',
          title: 'Lot NN'
        });
        markerNN.addListener('click', function(){
          clear();
          nnlotinfo.open(map,markerNN);
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

            var myPos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(myPos);
            positionArray.push(myPos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        // myPos = map.getCenter();
        document.getElementById('getDirections').addEventListener('click',
          function(){
          calculateAndDisplayRoute(directionsService,directionsDisplay,lotArray,lotArraySize);
        })
        //display directions window
        // directionsDisplay.setMap(map);

        // Info window information
        function clear(){
          for (var i=0;i<infoWindowArray.length;i++){
            infoWindowArray[i].close();
          }
          return;
        }
      }


      // Legend

      var icons = {
        all: {name:'UP Commuter, Commuter, Resident, Veteran',icon: 'img/all_student_parking.png'
      },commuter: {name:'UP Commuter, Commuter, Veteran',icon: 'img/commuter_parking.png'
      },resident :{name: 'Resident',icon:'img/res_parking.png'
      }
    };

    var legend = document.getElementById('legend');
    for(var key in icons){
      var type = icons[key];
      var name = type.name;
      var icon = type.icon;
      var div = document.createElement('div');
      div.innerHTML = '<img src="' +icon + '">' +name;
      legend.appendChild(div);
    }

      //failed attempt at GPS
      // function directionsHere(directionsService,directionsDisplay,lotArray,lotArraySize){
      //   var selectedMode = document.getElementById('mode').value;       
      //   var destination = document.getElementById('destinationLot').value;
      //   var foundStart = false;
      //   var foundEnd = false;
        // for(i=0;i<lotArraySize;i++){
        //   if(document.getElementById('startLot').value == lotArray[i].name){
        //     var start = lotArray[i];
        //     foundStart = true;
        //   }else if(document.getElementById('destinationLot').value == lotArray[i].name){
        //     var destination = lotArray[i]; 
        //     foundEnd = true;           
        //   }
        //   if(foundStart==false){
        //     window.alert('Could not find start');
        //   }
        //   if(foudnEnd == false){
        //     window.alert('Could not find end');
        //   }
        // }

      //     directionsService.route({
      //     origin: start,
      //     destination: destination,
      //     travelMode: google.maps.TravelMode[selectedMode]
      //   },function(response, status){
      //     if(status=='OK'){
      //       directionsDisplay.setDirections(response);
      //     }else{
      //       window.alert('Directions request failed due to ' +status);
      //     }
      //   });
      // }
      function calculateAndDisplayRoute(directionsService, directionsDisplay, lotArray,lotArraySize) {
        var selectedMode = document.getElementById('mode').value;
        var startLot = document.getElementById('startLot').value;
        var destinationLot = document.getElementById('destinationLot').value;
        var foundStart = false;
        var foundEnd = false;
        var start;
        var destination;
        for(i=0;i<lotArraySize;i++){
          if(startLot == lotArray[i].name){
            start = lotArray[i];
            foundStart = true;
          }
          if(destinationLot == lotArray[i].name){
            destination = lotArray[i]; 
            foundEnd = true;           
          }
        }
        if(startLot=="me"){
          startLot = positionArray[0];
        }
        // if(foundStart==false){
        //     window.alert('Could not find start');
        //   }
        //   if(foundEnd == false){
        //     window.alert('Could not find end');
        //   }
        if(start==destination){
          window.alert('Error: Make sure the starting lot and ending lot are different.');
        }else{
        directionsService.route({
          origin: startLot,  // Lot G.
          destination: destination,  // Lot GG.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      }
      function handleLocationError(browserHasGeolocation, infoWindow, myPos) {
        infoWindow.setPosition(myPos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
