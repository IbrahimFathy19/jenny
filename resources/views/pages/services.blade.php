
@extends('layouts.app')

@section('title')
    <title>{{config('app.name', 'Smart Assistant For Hotel Guests')}}</title>
@endsection
@section('content')
<!-- Card -->
<div class="card card-image" style="background-image: url('../images/app/image.png');background-size: 1440px 1300px;
background-repeat:no-repeat;">
  {{--  <img class="card-img-top" src="img_avatar1.png" alt="Card image">
    <div class="card-img-overlay">--}}
  <!-- Content -->
  <div class="rgba-black-strong py-5 px-4">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8">

        <!--Accordion wrapper-->
        <div class="accordion md-accordion accordion-5" id="accordionEx5" role="tablist"
          aria-multiselectable="true">

          <!-- Accordion card -->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading30">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse30" aria-expanded="true"
                aria-controls="collapse30">
                <i class="fas fa-handshake fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  Welcome message
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse30" class="collapse show" role="tabpanel" aria-labelledby="heading30"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">When a guest just checked in, using the aid of hotel application 
                  the guest data {name and mail} will be send to its room assistant, the assistant in the
                   room will use this data to communicate with the guest through his mail, once the assistant 
                   get the data, it sends a welcome mail to the guest, see the mail below!</p>
              </div>
            </div>
          </div>
          <!-- Accordion card -->

          <!-- Accordion card -->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading31">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse31" aria-expanded="true"
                aria-controls="collapse31">
                <i class="fas fa-grin-beam fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  Tell me a joke
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse31" class="collapse" role="tabpanel" aria-labelledby="heading31"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">Retrieve random joke from local database
                    This local database will be updated every 20 mins with new jokes this is an 
                    entartainment feature to make the guests laugh and have fun time in their accommodation in the hotel</p>
              </div>
            </div>
          </div>
          <!-- Accordion card -->

          <!-- Accordion card -->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading32">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse32" aria-expanded="true"
                aria-controls="collapse32">
                <i class="fas fa-sun fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  morning text
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse32" class="collapse" role="tabpanel" aria-labelledby="heading32"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">Every morning, when you wake up, the assistant tells the morning text to you.
                   This text has many sections and all are configured by you. You can choose some sections and skip the remaining. 
                  The sections are today’s date, quote, today’s news, today’s weather and new mails from your mail box.</p>
              </div>
            </div>
          </div>
          <!-- Accordion card -->
           <!-- Accordion card -->
           <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading33">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse33" aria-expanded="true"
                aria-controls="collapse33">
                <i class="fas fa-hourglass-half fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  estimate trip time
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse33" class="collapse" role="tabpanel" aria-labelledby="heading33"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">The smart assistant will send the location to our mob app and tell to the guest the time 
                  estimation for this trip Using google maps’ distance matrix API and its `googlemaps.distance_matrix` python client.</p>
              </div>
            </div>
          </div>
           <!-- Accordion card -->
           <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading34">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse34" aria-expanded="true"
                aria-controls="collapse34">
                <i class="fas fa-map-marked-alt fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  provide location
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse34" class="collapse" role="tabpanel" aria-labelledby="heading34"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">The guest requests the location of somewhere, the location is fetched using 
                  google maps and opened on the phone of the user using the assistant's mobile app</p>
              </div>
            </div>
          </div>
           <!-- Accordion card -->
           <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading35">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse35" aria-expanded="true"
                aria-controls="collapse35">
                <i class="fas fa-music fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  hotel sounds playlist
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse35" class="collapse" role="tabpanel" aria-labelledby="heading35"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">This function let the guest get the playlist played
                   in the hotel from the hotel data base through the hotel desktop Application using the
                    requester class mentioned before.</p>
              </div>
            </div>
          </div>
           <!-- Accordion card -->
           <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading36">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse36" aria-expanded="true"
                aria-controls="collapse36">
                <i class="fas fa-wifi fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  IOT controlling
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse36" class="collapse" role="tabpanel" aria-labelledby="heading36"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">IOT server will received a specific command from smart assistant to control 
                  an IOT device but the guest could provide this
                   command over voice to smart assistant hardware or control via controllers shown on mob app</p>
              </div>
            </div>
          </div>
           <!-- Accordion card -->
           <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading37">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse37" aria-expanded="true"
                aria-controls="collapse37">
                <i class="fas fa-ambulance fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  emergency call
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse37" class="collapse" role="tabpanel" aria-labelledby="heading37"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">In case of emergency the assistant will send an 
                  emergency request to the hotel reception in the desktop application using the requester class.   </p>
              </div>
            </div>
          </div> <!-- Accordion card -->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header p-0 z-depth-1" role="tab" id="heading38">
              <a data-toggle="collapse" data-parent="#accordionEx5" href="#collapse38" aria-expanded="true"
                aria-controls="collapse38">
                <i class="fas fa-bell fa-2x p-3 mr-4 float-left black-text" aria-hidden="true"></i>
                <h4 class="text-uppercase white-text mb-0 py-3 mt-1">
                  alarms
                </h4>
              </a>
            </div>

            <!-- Card body -->
            <div id="collapse38" class="collapse" role="tabpanel" aria-labelledby="heading38"
              data-parent="#accordionEx5">
              <div class="card-body rgba-black-light white-text z-depth-1">
                <p class="p-md-4 mb-0">Consists of two functions; one to take the input whenever the user needs to create 
                  an alarm and saves it to the database(json file)
                   with a certain time and certain week day and the user can set a ring tone, configure snoozing period 
                    and stops alarming</p>
              </div>
            </div>
          </div>
        
        </div>
        <!--/.Accordion wrapper-->

      </div>
    </div>
  </div>
  <!-- Content -->
</div>
<!-- Card -->
    </div>
@endsection