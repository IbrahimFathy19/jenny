@extends('layouts.app')

@section('title')
  <title>{{__("Settings")}}</title>
@endsection

<?php
use PragmaRX\Countries\Package\Countries;
?>

@section('content')
<div class="container my-5">
  <div class="row">
    
    @include('inc.settings-card')
    
    <div class="col-md-9 px-5">
      <form method="POST" action="{{ route('assistant.settings.update', $settings->user_profile_id) }}">
          @csrf
          <!--Errors-->
        <div class="row">
            @if ($errors->any())    
            <ul>
            @foreach ($errors->all() as $error)
              <li class='alert-danger'>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
        </div>
        {{-- Reminders --}}
        <div class="mb-5">
          <h3 class="h3 border-bottom border-info mb-3 pb-2">{{ __('Reminders')}}</h3>
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-5 pt-0">{{ __('Default reminder')}}</legend>
              <div class="col-sm-5">
                <div class="form-check">
                  <input id="reminder_default_assistant" class="form-check-input" type="checkbox" name="reminder_default_assistant" value="1"
                  
                  <?php
                  if ($settings->reminder_default_assistant) {
                    echo 'checked';
                  }
                  ?> >
                  @if ($errors->has('reminder_default_assistant'))
                  <span class="invalid-feedback" role="alert" >
                    <strong>{{ $errors->first('reminder_default_assistant') }}</strong>
                  </span>
                  @endif
                    
                  <label class="form-check-label" for="reminder_default_assistant">
                    {{ config('app.name') }}
                  </label>
                </div>


                <div class="form-check">
                  <input id="reminder_default_google_calendar" name="reminder_default_google_calendar" class="form-check-input" type="checkbox" value="1"
                  
                  <?php
                  if ($settings->reminder_default_google_calendar) {
                    echo 'checked';
                  }
                  ?> >

                  @if ($errors->has('reminder_default_google_calendar'))
                    <span class="invalid-feedback" role="alert" >
                      <strong>{{ $errors->first('reminder_default_google_calendar') }}</strong>
                    </span>
                  @endif

                  <label class="form-check-label" for="reminder_default_google_calendar">
                    {{ __('Google Calendar') }}
                  </label>
                </div>
              </div>
            </div>
          </fieldset>
        </div>


        {{-- Alarms --}}
        <div class="mb-5">
          <h3 class="h3 border-bottom border-info mb-3 pb-2">{{__('Alarms')}}</h3>
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-5 pt-0">{{__('Snooze')}}</legend>
              <div class="col-sm-5">
                <select class="custom-select" name="alarm_snooze_interval">
                  
                  <?php $minutes = [1, 3, 5, 10, 15];
                  foreach ($minutes as $value) {
                    echo ('<option value="'.$value.'"');
                    if($value == $settings->alarm_snooze_interval) {
                      echo ('selected');
                    }
                    echo ('>'.$value.' minutes</option>');
                  }?>

                  @if ($errors->has('alarm_snooze_interval'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('alarm_snooze_interval') }}</strong>
                  </span>
                  @endif
                  
                </select>
              </div>
            </div>


            <div class="row pt-3">
              <legend class="col-form-label col-sm-5 pt-0">Number of snoozes</legend>
              <div class="col-sm-5">
                <select class="custom-select" name="alarm_n_snooze">
                 
                 <?php $n_snooze = ["No snooze", 1, 2, 3, 4, 5];
                  foreach ($n_snooze as $key => $value) {
                    echo ('<option value="'.$key.'"');
                    if($key == $settings->alarm_n_snooze) {
                      echo ('selected');
                    }
                    echo ('>'.$value.'</option>');
                  }?>

                  @if ($errors->has('alarm_n_snooze'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('alarm_n_snooze') }}</strong>
                  </span>
                  @endif
                  
                </select>
              </div>
            </div>
            <div class="row pt-3">
              <legend class="col-form-label col-sm-5 pt-0">Choose your Favourite alarm</legend>
              <div class="col-sm-5">
               
                <select class="custom-select" name="alarm_ringtone_name">
                  {{-- Alarms should be placed in database --}}
                  <?php $alarms = ["Alermax", "Hinto", "Sidar"];
                  foreach ($alarms as $value) {
                    echo ('<option value="'.$value.'"');
                    if($value == $settings->alarm_ringtone_name) {
                      echo ('selected');
                    }
                    echo ('>'.$value.'</option>');
                  }?>

                  @if ($errors->has('alarm_ringtone_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('alarm_ringtone_name') }}</strong>
                  </span>
                  @endif
                  
                </select>
              </div>
            </div>
          </fieldset>
        </div>




        {{-- Weather --}}

        <div class="mb-5">
          <h3 class="h3 border-bottom border-info mb-3 pb-2">Weather</h3>
          <fieldset class="form-group">
            {{-- <div class="row">
              <legend class="col-form-label col-sm-5 pt-0">Location</legend>
              <div class="col-sm-5">
                 
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="weather" id="anotherLocation" value="option3">
                      <label class="form-check-label" for="anotherLocation">
                        Another location
                      </label>
                    </div>
              </div>
            </div> --}}
                
            <div class="row" id="countrySelect">
              <legend class="col-form-label col-sm-5 pt-0">Get weather from</legend>
              <div class="col-sm-5">
                <select class="custom-select" name="weather_location_country" onchange="get_val(this);">
                  
                  <?php
                  $countries = Countries::all()->pluck('name.common');
                  foreach ($countries as $country) {
                      echo ('<option value="'.$country.'"');
                      if($country == $settings->weather_location_country) {
                        echo ('selected');
                      }
                      echo ('>'.$country.'</option>');
                  }   
                  ?>

                  @if ($errors->has('weather_location_country'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('weather_location_country') }}</strong>
                  </span>
                  @endif
                  
                </select>
              </div>
            </div>
             
            {{-- <div class="row pt-3" style="" id="citySelect">
                <legend class="col-form-label col-sm-5 pt-0">City</legend>
                <div class="col-sm-5">
                  <select class="custom-select" name="state"> --}}
                       <?php 
                      //modify this and use AJAX
                      
                      // $countries = new Countries();
                      // $cities = $countries->where('name.common', $country)
                      //   ->first()
                      //   ->hydrateStates()
                      //   ->states
                      //   ->sortBy('name')
                      //   ->pluck('name', 'postal');

                      // foreach ($cities as $key => $city) {
                      //   echo "<option value='$key'>$city</option>";
                      // }   
                      ?> 
                  {{-- </select>
                </div>
              </div>  --}}
          </fieldset>
        </div>


        {{-- News --}}
        <div class="mb-5">
            <h3 class="h3 border-bottom border-info mb-3 pb-2">News</h3>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-5 pt-0">Hear news from</legend>
                <div class="col-sm-5">
                  <select class="custom-select" name="news_location_country">
                    <?php
                    $countries = Countries::all()->pluck('name.common');
                    foreach ($countries as $country) {
                        echo ('<option value="'.$country.'"');
                        if($country == $settings->news_location_country) {
                          echo ('selected');
                        }
                        echo ('>'.$country.'</option>');
                      echo "<option value='$key'>$country</option>";
                    }   
                    ?>
                    
                    @if ($errors->has('news_location_country'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('news_location_country') }}</strong>
                    </span>
                    @endif
                  </select>
                  
                </div>
              </div>
             
              <div class="row pt-3">
                <legend class="col-form-label col-sm-5 pt-0">What type of news do you prefer?</legend>
                <div class="col-sm-5">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="news_interest_business" name="news_interest_business"
                    value="1"
                      
                      <?php
                      if ($settings->news_interest_business) {
                        echo 'checked';
                      }
                      ?> >

                      @if ($errors->has('news_interest_business'))
                      <span class="invalid-feedback" role="alert" >
                        <strong>{{ $errors->first('news_interest_business') }}</strong>
                      </span>
                      @endif
                    <label class="form-check-label" for="news_interest_business">
                      {{ __('Business') }}
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="news_interest_entertainment" name="news_interest_entertainment"
                      value="1"
                        
                        <?php
                        if ($settings->news_interest_entertainment) {
                          echo 'checked';
                        }
                        ?> >
                        @if ($errors->has('news_interest_entertainment'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('news_interest_entertainment') }}</strong>
                        </span>
                        @endif
                        
                    <label class="form-check-label" for="news_interest_entertainment">
                      {{ __('Entertainment') }}
                    </label>
                  </div>
                  

                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="news_interest_health" name="news_interest_health"
                      value="1"
                        
                        <?php
                        if ($settings->news_interest_health) {
                          echo 'checked';
                        }
                        ?> >
                        @if ($errors->has('news_interest_health'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('news_interest_health') }}</strong>
                        </span>
                        @endif

                      <label class="form-check-label" for="news_interest_health">
                        {{ __('Health') }}
                      </label>
                    </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="news_interest_science" name="news_interest_science"
                    value="1"
                        
                        <?php
                        if ($settings->news_interest_science) {
                          echo 'checked';
                        }
                        ?> >
                        @if ($errors->has('news_interest_science'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('news_interest_science') }}</strong>
                        </span>
                        @endif

                    <label class="form-check-label" for="news_interest_science">
                      {{ __('Science')}}
                    </label>
                  </div>


                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="news_interest_sport" name="news_interest_sport"
                    value="1"
                        
                        <?php
                        if ($settings->news_interest_sport) {
                          echo 'checked';
                        }
                        ?> >
                        @if ($errors->has('news_interest_sport'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('news_interest_sport') }}</strong>
                        </span>
                        @endif
                    <label class="form-check-label" for="news_interest_sport">
                      {{ __('Sport') }}
                    </label>
                  </div>
                </div>
              </div>
              </fieldset>
            </div>


            {{-- Morning Text --}}
            <div class="mb-5">
              <h3 class="h3 border-bottom border-info mb-3 pb-2">Morning Text</h3>
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-5 pt-0">What type of morning text would you like to hear?</legend>
                  <div class="col-sm-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="morning_text_quote" name="morning_text_quote"
                        value="1"
                          
                          <?php
                          if ($settings->morning_text_quote) {
                            echo 'checked';
                          }
                        ?> >
                        @if ($errors->has('morning_text_quote'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('morning_text_quote') }}</strong>
                        </span>
                        @endif
                      <label class="form-check-label" for="morning_text_quote">
                        {{ __('Quotes') }}
                      </label>
                    </div>


                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="morning_text_mail" name="morning_text_mail"
                        value="1"
                          
                          <?php
                          if ($settings->morning_text_mail) {
                            echo 'checked';
                          }
                        ?> >
                        @if ($errors->has('morning_text_mail'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('morning_text_mail') }}</strong>
                        </span>
                        @endif
                      <label class="form-check-label" for="morning_text_mail">
                        {{ __('Mails')}}
                      </label>
                    </div>


                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="morning_text_news" name="morning_text_news"
                      value="1"
                          
                          <?php
                          if ($settings->morning_text_news) {
                            echo 'checked';
                          }
                        ?> >
                        @if ($errors->has('morning_text_news'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('morning_text_news') }}</strong>
                        </span>
                        @endif
                      <label class="form-check-label" for="morning_text_news">
                        {{ __('News') }}
                      </label>
                    </div>


                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="morning_text_weather"
                      name="morning_text_weather"
                      value="1"
                          
                          <?php
                          if ($settings->morning_text_weather) {
                            echo 'checked';
                          }
                        ?> >
                        @if ($errors->has('morning_text_weather'))
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $errors->first('morning_text_weather') }}</strong>
                        </span>
                        @endif
                      <label class="form-check-label" for="morning_text_weather">
                        {{ __('Weather')}}
                      </label>
                    </div>
                        
                  </div>
                </div>
              </fieldset>
            </div>



            {{-- Save changes --}}
            <div class="mb-5">
              <h3 class="h3 border-bottom border-info mb-3 pb-2">Save changes</h3>
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-5 pt-0">Save changes?</legend>
                  <div class="col-sm-5 d-flex justify-content-end">
                    <div class="mr-3">
                      <button type="submit" class="btn btn-secondary">{{__('Cancel')}}</button>
                      </div>
                      <div class="">
                          <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>   
      </form>
    </div>
  </div>
</div>
  
@endsection
