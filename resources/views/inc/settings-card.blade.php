
<div class="col-md-3">
  <div class="card bg-light">
    <div class="card-header">
      {{__('Settings')}}
    </div>
    <div class="list-group-flush">
      <a href="{{route("assistant-settings")}}" class="list-group-item list-group-item-action 
        <?php if(Request::segment(1) === 'assistant-settings')
          echo 'active'; 
        ?>
      ">
        {{__('Assistant Settings')}}
      </a>
      
      <a href="{{route("profile-settings")}}" class="list-group-item list-group-item-action 
        <?php if(Request::segment(1) === 'profile-settings')
          echo 'active'; 
        ?>
      ">{{__('Profile Settings')}}
      </a>
    </div>
  </div>
      
</div>